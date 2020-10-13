<template>
	<div>
		<div class="row mb-3">
			<div class="col-md-12">
				<button class="btn btn-success float-right" @click="handleOrderSave">Save</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="mb-5">
					<p>Customer Details</p>
					<order-form @customerDetailsChanged="customerDetailsHandle"></order-form>	
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
				originalMenuItems: [],
				customerDetails: null,
				//finalAmout:0,
			}
		},

		created() {
			this.loadRestoMenuItems();
			window.eventBus.$on('addMenuItem', this.handleNewMenuItem);
			// window.eventBus.$on('filteredList', this.handleFilteredList);
			// window.eventBus.$on('clearFilteredList', this.handleClearFilteredList);
			window.eventBus.$on('filteredEventList', this.handleFilteredEventList);
			window.eventBus.$on('removeOrderedItem', this.handleRemoveOrderedItem);
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
			},

			customerDetailsHandle(customer) {
				this.customerDetails = customer;
			},

			handleRemoveOrderedItem(item) {
				this.orderDetails = this.orderDetails.filter(orderDetail => orderDetail.id != item.id);
				console.log(item);
			},

			handleOrderSave() {
				let orderItemsIds = [];
				this.orderDetails.forEach(item => {
					orderItemsIds.unshift(item.id);
				})

				let orderData = {
					resto_id: this.restoId,
					order_data:{
						customerDetails: this.customerDetails,
						totalPrice: this.finalAmout,
						orderedItems: orderItemsIds						
					}
				};
	//			console.log(orderData);
				// axios.post('/api/order/save', orderData)
				// .then(response => {
				// 	console.log(response);
				// })
				// .catch(error => console.error(error.response));

				axios.post('/api/order/save', orderData)
				.then(response => {
					console.log(response)
				})
				.catch(error => {
					console.error(error.response)
				});
			}
		}
	}
</script>