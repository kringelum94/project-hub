<template>
      <modal name="invite-member-modal" classes="box relative" height="auto" @before-open="beforeOpen">
        <a href="" @click.prevent="$modal.hide('invite-member-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Edit the project </h2>
        <form @submit.prevent="submit">
            <div>
                <div class="mb-4">
                    <input type="email" class="input" :class="form.errors.email ? 'is-invalid' : ''" name="email" v-text="form.email" v-model="form.email" required placeholder="User e-mail">
                    <span class="text-red text-sm my-1 block text-center" v-if="form.errors.email" v-text="form.errors.email[0]"></span>
                </div>
            </div>

            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Invite user</button>
                    <button type="button" @click="$modal.hide('invite-member-modal')" class="button danger">Cancel</button>
                </div>
            </div>
        </form>
    </modal>
</template>

<script>
import ProjectHubForm from './ProjectHubForm';

export default {
    data() {
        return {
            form: new ProjectHubForm({
                email: ''
            }),
            path: ''
        };
    },

    methods: {
        beforeOpen (event) {
            this.path = event.params.path;
        },
        submit() {
            this.form.post(this.path)
            .then(response => location = response.data.message);
        }    
    }
}
</script>

<style>

</style>