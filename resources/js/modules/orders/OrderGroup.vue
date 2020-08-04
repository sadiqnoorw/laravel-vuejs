<template>
	<div class="row">
		<div class="col-md-7">
			<div class="mb-5">
				<p>Customer Details</p>
				<order-form></order-form>	
			</div>
			 
			<div class="mb-3">
				<h3>Order Details 
					<span class="float-right" v-if="finalAmout > 0">{{finalAmout}} </span> 
				</h3>
				<order-details :order-details="orderDetails"></order-details>	
			</div>
		</div>

		<div class="col-md-5">
			<p>Menu items </p>
	
			<order-menu-items 
			:items="menuItems"
			@addMenuItem="handleNewMenuItem"
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
				originalMenuItems: []
				//finalAmout:0,
			}
		},

		created() {
			this.loadRestoMenuItems();
			window.eventBus.$on('addMenuItem', this.handleNewMenuItem);
			// window.eventBus.$on('filteredList', this.handleFilteredList);
			// window.eventBus.$on('clearFilteredList', this.handleClearFilteredList);
			window.eventBus.$on('filteredEventList', this.handleFilteredEventList);
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
				.then(response => {
					this.menuItems = response.data;
					this.originalMenuItems = response.data;
				})
				.catch(error => console.error(error.response));
			},

			handleNewMenuItem(item) {
			//	this.finalAmout = this.finalAmout + item.price;
				this.orderDetails.unshift(item);
			},

			// handleFilteredList(filteredList) {
			// 	this.menuItems = filteredList;
			// }, 

			// handleClearFilteredList() {
			// 	this.menuItems = this.originalMenuItems; 
			// },

			handleFilteredEventList(searchValue){
				let filteredList = [];

				this.menuItems = this.originalMenuItems.filter(item => {
				 	return item.name.toLowerCase().includes(searchValue.toLowerCase());
				 });
				
//				this.menuItems = filteredList;

			}

		}

	}
</script>