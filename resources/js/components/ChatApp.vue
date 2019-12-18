<template>
    <div id="chat-app" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                            v-on:messagesent="addMessage"
                            :user="user"
                            :project="project"
                        ></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
        return {
            messages: [{
                message: "",
                user: this.user,
                project:""
            }]
        }
    },
    created() {
        this.fetchMessages();
        Echo.private("chat").listen("MessageSent", e => {
            this.messages.push({
                message: e.message.message,
                user: e.user,
                project: e.project
            });
        });
    },

    methods: {
        fetchMessages() {
            axios
                .get("/projects/" + this.messages.project + "/chat")
                .then(response => {
                    this.messages = response.data;
                });
        },

        addMessage(message) {
            this.messages.push(message);

            axios
                .post("/projects/" + this.messages.project + "/chat", message)
                .then(response => {
                    console.log(response.data);
                });
        }
    }
  }
</script>