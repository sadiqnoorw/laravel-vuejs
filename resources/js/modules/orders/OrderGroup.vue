<template>
	<div class="row">
		<div class="col-md-7">
			 <p>This is where form and order details will come</p>
			<order-form></order-form>	
		</div>

		<div class="col-md-5">
			<p>This is where menu will come </p>
	
			<order-menu-items :items="menuItems"></order-menu-items>
		</div>
	</div>
</template>

<script>
	import OrderForm from './OrderForm.vue';
	import OrderMenuItems from './OrderMenuItems.vue';
	import axios from 'axios';
	export default {
		props: ['restoId'],
		components: {
			OrderForm,
			OrderMenuItems
		},
		data() {
			return {
				menuItems: [],
			}
		},

		created() {
			this.loadRestoMenuItems();
		},

		methods: {
			loadRestoMenuItems() {
				let postData = {restoId: this.restoId};
				axios.post('/api/resto/menu', postData)
				.then(response => console.log('response', this.menuItems = response.data))
				.catch(error => console.error(error.response));
			}
		}

	}
</script>