<template>
	<ul class="list-group">
		<li class="list-group-item" v-for="(orderDetail, key) in orderDetails" :key="key">
			<strong>{{ orderDetail.name }}</strong>, <small>{{ orderDetail.category.name }}</small>
			<span class="float-right">
				{{ orderDetail.price }}
				<span class="ml-3" @click="handleRemoveItem(orderDetail)">*</span>
			</span>
		</li>
	</ul>
</template>
<script>
	export default {
		props: ['orderDetails'],

		methods: {
			handleRemoveItem(item){
				window.eventBus.$emit("removeOrderedItem", item);
			}
		}
	}
</script>