<template>
    <div>
        <div ref="chatDiv" class="overflow-y-auto h-60 px-4">
            <ul class="chat">
                <li v-for="message in messages" :key="message.id">
                    <div class="bg-header border-2 border-green mb-6 p-2 rounded-lg block max-w-70 w-fit-content shadow" :class="{'ml-auto' : user.id == message.user.id}">
                        <div class="flex items-center mb-2" :class="user.id == message.user.id ? 'pl-4 justify-end' : 'pr-4'">
                            <img 
                                :title="message.user.username" 
                                :src="message.user.gravatar_pic + '?s=60&d=https://danielkringelum.dk/no-image-icon-grey.png'" 
                                :alt="message.user.username + 's avatar'" 
                                class="rounded-full w-12"
                                :class="user.id == message.user.id ? 'chat-img-right' : 'mr-4'">
                            <div>
                                <div>
                                    <strong class="title">{{ message.user.username }}</strong>
                                    <span class="text-grey text-xs ml-1">{{ message.created_at | moment("from", "now") }}</span>
                                </div>
                                <p class="text-grey text-sm font-bold">{{ message.text }}</p>
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
                            <textarea type="text" class="textarea input w-full" 
                                v-model="text" @keydown.enter="handleSubmit(store)" 
                                placeholder="Type your message here...">
                            </textarea>
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
        props: ['project', 'user', 'old_messages'],

        components: {
            ValidationProvider,
            ValidationObserver
        },

        data() {
            return {
                messages: Object.values(this.old_messages),
                text: '',
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
                axios.post('/projects/' + this.project_id + '/chat', {text: this.text, project_id: this.project.id})
                .then((response) => {
                    this.reset();
                    this.messages.push(response.data);
                });
            },

            listenForMessageSent() {
                Echo.private('projects.' + this.project.id)
                    .listen('MessageSent', (e) => {
                        this.messages.push(e);
                    });
            },
            reset() {
                this.text = '';
                this.$refs.observer.reset();
            },
        }
    }
</script>
