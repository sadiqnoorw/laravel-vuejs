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

                        <menu-groups :items="currentMenuItems" ></menu-groups>
                    </template>



                </card-component>

            </div>  
            <div class="col-md-4">
                
                <div class="card">  
                    <card-component>
                        <template slot='title'>Add menu items</template>
                        <template slot='main'>
                            <menu-add-form :categories="categories"></menu-add-form>
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
        props: ['items'],
        components: {
          
            Multiselect, MenuGroups, MenuAddForm
        
        },

        created() {
            _.forEach(this.items, (item, key) => {
                this.categories.push(key);
            });

            this.menu = this.categories[0]
        },

        data() {
            return {
                categories: [],
                menu: ''
            }
        },

        computed: {
            currentMenuItems() {
                return this.items[this.menu];
            }
        }
        
    }
</script>