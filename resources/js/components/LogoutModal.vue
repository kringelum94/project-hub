<template>
      <modal name="logout-modal" classes="box relative" height="auto">
        <a href="" @click.prevent="$modal.hide('logout-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Logout? </h2>
        <p class="text-center text-grey font-medium pb-4">Are you really sure you want to logout of Project Hub?</p>
        <form @submit.prevent="submit">
            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Yes, logout</button>
                    <button type="button" @click="$modal.hide('logout-modal')" class="button danger">Cancel</button>
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
            })
        };
    },

    methods: {
        submit() {
            this.form.submit('/logout')
            .then(location = '/');
        }    
    }
}
</script>