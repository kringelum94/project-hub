<template>
    <div>
    <div class="panel panel-primary">
            <div class="panel-heading" id="accordion">
                <span class="glyphicon glyphicon-comment"></span> {{ project.title }}''
                <div class="btn-group pull-right">
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion-" :href="'#collapseOne-' + project.id">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                </div>
            </div>
            <div class="panel-collapse collapse" :id="'collapseOne-' + project.id">
                <div class="panel-body chat-panel">
                    <ul class="chat">
                        <li v-for="conversation in conversations">
                        <span class="chat-img pull-left">
                            <img :title="conversation.user.username" :src="'https://www.gravatar.com/avatar/' + conversation.user.email + '?s=60&d=https://danielkringelum.dk/no-image-icon-grey.png'" :alt="conversation.user.username + 's avatar'" class="rounded-full w-8 mr-2">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{{ conversation.user.username }}</strong>
                                </div>
                                <p>
                                    {{ conversation.message }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." v-model="message" @keyup.enter="store()" autofocus />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat" @click.prevent="store()">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['project'],

        data() {
            return {
                conversations: [],
                message: '',
                project_id: this.project.id
            }
        },

        mounted() {
            this.listenForMessageSent();
        },

        methods: {
            store() {
                axios.post('/projects/' + this.project_id + '/chat', {message: this.message, project_id: this.project.id})
                .then((response) => {
                    this.message = '';
                    console.log(response);
                    this.conversations.push(response.data);
                });
            },

                listenForMessageSent() {
                Echo.private('projects.' + this.project.id)
                    .listen('MessageSent', (e) => {
                        console.log(e);
                        this.conversations.push(e);
                    });
            }
        }
    }
</script>
