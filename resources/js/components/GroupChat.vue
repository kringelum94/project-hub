<template>
    <div>
        <div ref="chatDiv" class="overflow-y-auto h-60 px-4">
            <ul class="chat">
                <li v-for="conversation in conversations" :key="conversation.id">
                    <div class="bg-header border-2 border-green mb-6 p-2 rounded-lg block max-w-70 w-fit-content shadow" :class="{'ml-auto' : user.id == conversation.user.id}">
                        <div class="flex items-center mb-2" :class="user.id == conversation.user.id ? 'pl-4 justify-end' : 'pr-4'">
                            <img 
                                :title="conversation.user.username" 
                                :src="conversation.user.gravatar_pic + '?s=60&d=https://danielkringelum.dk/no-image-icon-grey.png'" 
                                :alt="conversation.user.username + 's avatar'" 
                                class="rounded-full w-12"
                                :class="user.id == conversation.user.id ? 'chat-img-right' : 'mr-4'">
                            <div>
                                <div>
                                    <strong class="title">{{ conversation.user.username }}</strong>
                                    <span class="text-grey text-xs ml-1">{{ conversation.created_at | moment("from", "now") }}</span>
                                </div>
                                <p class="text-grey text-sm font-bold">{{ conversation.message }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="panel-footer">
            <div>
                <validation-observer ref="observer" v-slot="{ handleSubmit }">
                    <form @submit.prevent="handleSubmit(store)">
                        <validation-provider rules="required" v-slot="{ errors }">
                            <textarea type="text" class="textarea input w-full" v-model="message" @keyup.enter="store()" placeholder="Type your message here..."></textarea>
                            <button class="button my-4">Send message</button>
                            <span class="text-red font-bold">{{ errors[0] }}</span>
                        </validation-provider>
                    </form>
                </validation-observer>
            </div>
        </div>
    </div>
</template>

<script>
    import { ValidationObserver, ValidationProvider, extend } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';
    
    extend('required', {
        ...required,
        message: 'Come on.. Write something!'
    });

    export default {
        props: ['project', 'user', 'messages'],

        components: {
            ValidationProvider,
            ValidationObserver
        },

        data() {
            return {
                conversations: Object.values(this.messages),
                message: '',
                project_id: this.project.id
            }
        },

        mounted() {
            this.scroll();
            this.listenForMessageSent();
        },

        updated() {
            this.scroll();
        },

        methods: {
            scroll(){
                this.$refs.chatDiv.scrollTop = this.$refs.chatDiv.scrollHeight;
            },

            store() {
                this.uiState = "form submitted";
                axios.post('/projects/' + this.project_id + '/chat', {message: this.message, project_id: this.project.id})
                .then((response) => {
                    this.reset();
                    this.conversations.push(response.data);
                });
            },

            listenForMessageSent() {
                Echo.private('projects.' + this.project.id)
                    .listen('MessageSent', (e) => {
                        this.conversations.push(e);
                    });
            },
            reset() {
                this.message = '';
                this.$refs.observer.reset();
            },
        }
    }
</script>
