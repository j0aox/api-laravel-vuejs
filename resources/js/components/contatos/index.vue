<script setup>
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();

let contatos = ref([]);

onMounted(async () => {
  getContatos();
});

const newContato = () => {
  router.push("/contato/new");
};

const getContatos = async () => {
  let response = await axios.get("/api/get_all_contato");
  contatos.value = response.data.contatos;
};

const ourImage = (img) => {
  return "/upload/" + img;
};

const onEdit = (id) => {
  router.push("/contato/edit/" + id);
};

const deleteContato = (id) => {
    Swal.fire({
        title: "Você tem certeza?",
        text: "Não pode voltar atrás",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    })
    .then((result) => {
        if (result.value) {
            axios.get('/api/delete_contato/'+id)
            .then(() => {
                Swal.fire(
                    'Deletado',
                    'Contato deletado',
                    'success'
                );

                getContatos();
            })
            .catch(() => {
                Swal.fire("Falhou!", "Alguma coisa errado.", "Warning");
            })
        }
    })
}
</script>

<template>
  <div class="container">
    <div class="products__list table my-3">
      <div
        class="
          customers__titlebar
          dflex
          justify-content-between
          align-items-center
        "
      >
        <div class="customers__titlebar--item">
          <h1 class="my-1">Contatos</h1>
        </div>
        <div class="customers__titlebar--item">
          <button class="btn btn-secondary my-1" @click="newContato">
            Adicionar
          </button>
        </div>
      </div>

      <div
        class="table--heading mt-2 products__list__heading"
        style="padding-top: 20px; background: #fff"
      >
        <!-- <p class="table--heading--col1">&#32;</p> -->
        <p class="table--heading--col1">Imagem</p>
        <p class="table--heading--col2">Nome</p>
        <p class="table--heading--col4">E-mail</p>
        <p class="table--heading--col3">Senha</p>
        <!-- <p class="table--heading--col5">&#32;</p> -->
        <p class="table--heading--col5">Ações</p>
      </div>

      <!-- product 1 -->
      <div
        class="table--items products__list__item"
        v-for="item in contatos"
        :key="item.id"
        v-if="contatos.length > 0"
      >
        <div class="products__list__item--imgWrapper">
          <img
            class="products__list__item--img"
            :src="ourImage(item.photo)"
            style="height: 40px"
            v-if="item.photo"
          />
        </div>
        <p class="table--items--col2">{{ item.name }}</p>
        <p class="table--items--col2">{{ item.email }}</p>
        <p class="table--items--col3">{{ item.password }}</p>
        <div>
          <button class="btn-icon btn-icon-success" @click="onEdit(item.id)">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn-icon btn-icon-danger" @click="deleteContato(item.id)">
            <i class="far fa-trash-alt"></i>
          </button>
        </div>
      </div>
      <div class="table--items products__list__item" v-else>
        <p>Não encontrado</p>
      </div>
    </div>
  </div>
</template>
