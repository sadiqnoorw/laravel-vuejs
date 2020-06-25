<template>
	<div class="wrapper">
		<p v-for="item in items"> display menu items</p>
	</div>
</template>
<script>
	export default{
		props: ['items'],
		
	}
</script>