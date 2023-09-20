<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  props:{
    response: Object,
  },
  methods: {
    isPublic(num = 0) {
      if (![1, 2].includes(num) return '' )
    }
  }
};
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">Product</h2>
        <Link :href="route('product.create')">
          <button type="button" class="font-semibold text-x1 text-gray-800 leading-tight border border-black p-3 rounded-[6px]">新增商品</button>
        </Link>
      </div>
    </template>
    <section id="product">
    </section>
  </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
#product {
}
</style>

