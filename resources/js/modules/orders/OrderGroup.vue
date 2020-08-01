<template>
	<div class="row">
		<div class="col-md-7">
			<div class="mb-5">
				<p>This is where form and order details will come</p>
				<order-form></order-form>	
			</div>
			 
			<div class="mb-3">
				<h3>Order Details <span class="float-right" v-if="finalAmout > 0">{{finalAmout}}</span> </h3>
				<order-details :order-details="orderDetails"></order-details>	
			</div>
		</div>

		<div class="col-md-5">
			<p>This is where menu will come </p>
	
			<order-menu-items 
			:items="menuItems"
			@menuItemAdded="handleNewMenuItem"
			></order-menu-items>
		</div>
	</div>
</template>

<script>
	import OrderForm from './OrderForm.vue';
	import OrderMenuItems from './OrderMenuItems.vue';
	import OrderDetails from './OrderDetails.vue';
	import axios from 'axios';

	export default {
		props: ['restoId'],
		components: {
			OrderForm,
			OrderMenuItems,
			OrderDetails
		},
		data() {
			return {
				menuItems: [],
				orderDetails: [],
				//finalAmout:0,
			}
		},

		created() {
			this.loadRestoMenuItems();
		},

		computed: {
			finalAmout() {
				let price = 0;
				this.orderDetails.forEach(order => price = price + order.price );

				return price;
			}
		},

		methods: {
			loadRestoMenuItems() {
				let postData = {restoId: this.restoId};
				axios.post('/api/resto/menu', postData)
				.then(response => console.log('response', this.menuItems = response.data))
				.catch(error => console.error(error.response));
			},

			handleNewMenuItem(item) {
			//	this.finalAmout = this.finalAmout + item.price;
				this.orderDetails.unshift(item);
			}
		}

	}
</script>