/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VModal from "vue-js-modal";

Vue.use(VModal);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "theme-switcher",
    require("./components/ThemeSwitcher.vue").default
);
Vue.component(
    "new-project-modal",
    require("./components/NewProjectModal.vue").default
);
Vue.component(
    "edit-project-modal",
    require("./components/EditProjectModal.vue").default
);
Vue.component(
    "delete-project-modal",
    require("./components/DeleteProjectModal.vue").default
);
Vue.component(
    "invite-member-modal",
    require("./components/InviteMemberModal.vue").default
);
Vue.component("dropdown", require("./components/Dropdown.vue").default);

Vue.component("login-modal", require("./components/LoginModal.vue").default);

Vue.component("logout-modal", require("./components/LogoutModal.vue").default);

Vue.component(
    "create-list-modal",
    require("./components/CreateListModal.vue").default
);

Vue.component(
    "edit-list-modal",
    require("./components/EditListModal.vue").default
);

Vue.component(
    "delete-list-modal",
    require("./components/DeleteListModal.vue").default
);

Vue.component(
    "create-task-modal",
    require("./components/CreateTaskModal.vue").default
);

Vue.component(
    "edit-task-modal",
    require("./components/EditTaskModal.vue").default
);

Vue.component(
    "delete-task-modal",
    require("./components/DeleteTaskModal.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
