<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

export default {
  components: {
    AuthenticatedLayout,
    Head,
  },
  data() {
    return {
      formData: {
        name: '',
        price: '',
        public: '',
        desc: '',
      },
    };
  },
  methods: {
    submitData() {
      router.visit(router('product.store'), { methods: 'post', data: this.formData,
        preserveState: true,
        onSuccess: ({ props }) => {
          if (props.flash.message.rt_code === 1) {
            Swal.fire({
              title: '新增成功',
              showDenyButtonText: 'true',
              confirmButton: '回列表',
              denyButtonText: '取消',
            }).then((result) => {
              if (result.iConfirmed) {
                router.get(route('product.list'));
              }
            });
          }
        },
      });
    },
  },
};
</script>

<template>
  <Head title="product-create" />
  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">Product新增商品</h2>
      </div>
    </template>
    <section id="product-create" class="px-[15px] py-[10px] bg-white mt-[30px] rounded-[6px]">
      <form @submit.prevent="submitData()">
        <label>
          商品名稱:
          <input v-model="formData.name" type="text" required>
        </label>
        <label>
          商品價格:
          <input v-model="formData.price" type="number" min="0" required>
        </label>
        <label>
          公開/非公開:
          <div class="flex items-center gap-[10px]">
            <input v-model="formData.public" type="radio" value="1" required>
            公開
            <input v-model="formData.public" type="radio" value="2">
            非公開
          </div>
        </label>
        <label>
          商品描述:
          <input v-model="formData.desc" type="text">
        </label>
        <div class="flex justify-center items-center gap-[45px]">
          <button class="btn" type="button">取消新增</button>
          <button class="btn" type="submit">確認新增</button>
        </div>
      </form>
    </section>
  </AuthenticatedLayout>
</template>

<style lang="scss" scoped>
#product-create {
    form {
        @apply flex flex-col gap-[10px];
    }
    .btn{
        @apply border border-[#3b82f680] bg-[#3b82f680] font-bold px-[15px] py-[10px] rounded-[5px];
    }
}
</style>
