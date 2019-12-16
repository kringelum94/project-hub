<template>
      <modal name="delete-project-modal" classes="box relative" height="auto" @before-open="beforeOpen">
        <a href="" @click.prevent="$modal.hide('delete-project-modal')">
            <i class="fas fa-times text-grey font-bold text-2xl absolute right-0 top-0 p-4 hover:text-red"></i>
        </a>
        <h2 class="title text-center py-4"> Delete the project? </h2>
        <p class="text-center text-grey font-medium pb-4">Are you really sure you want to delete the project?</p>
        <form @submit.prevent="submit">
            <div class="py-4">
                <div class="flex justify-around">
                    <button type="submit" class="button">Yes, delete project</button>
                    <button type="button" @click="$modal.hide('delete-project-modal')" class="button danger">Cancel</button>
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
            }),
            path: ''
        };
    },

    methods: {
        beforeOpen (event) {
            this.path = event.params.path;
        },
        submit() {
            this.form.delete(this.path)
            .then(response => location = response.data.message);
        }    
    }
}
</script>