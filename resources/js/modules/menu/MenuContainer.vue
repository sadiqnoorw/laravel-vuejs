<template>
    <div class="wrapper manu__container">
        <div class="row">
            <div class="col-md-8">
                <card-component>

                    <template slot='title'>My Menu Items</template>
                    
                    <template slot='main'>
                        <div class="section">
                            <Multiselect 
                                :options="categories"
                                v-model='menu'
                                >
                            </multiselect>
                        </div>

                        <menu-groups :items="currentMenuItems" currentMenuItems=""></menu-groups>
                    </template>



                </card-component>

            </div>  
            <div class="col-md-4">
                
                <div class="card">  
                    <card-component>
                        <template slot='title'>Add menu items</template>
                        <template slot='main'>
                            <menu-add-form 
                                :categories="categories" 
                                :resto-id="restoId"
                                v-on:newMenuItemAdded="handleNewMenuItem"
                            ></menu-add-form>
                        </template>

                    </card-component>
                </div>

            </div>  
        </div>
    </div>
</template>

<script>
Vue.component('card-component', require('../../components/Card.vue').default);
import Multiselect from 'vue-multiselect';
import MenuGroups from "./MenuGroups.vue";
import MenuAddForm from "./MenuAddForm.vue";

    export default {
        props: ['items', 'restoId'],
        components: {
          
            Multiselect, MenuGroups, MenuAddForm
        
        },

        created() {
            _.forEach(this.items, (item, key) => {
                this.categories.push(key);
            });

            this.menu = this.categories[0];
            this.localItems = this.items;
        },

        data() {
            return {
                localItems: '',
                categories: [],
                menu: '',
            }
        },

        computed: {
            currentMenuItems() {
                return this.localItems[this.menu];
            }
        },

        methods: {
            handleNewMenuItem(item, category) {
                this.localItems[category].unshift(item);
            }
        }
        
    }
</script>