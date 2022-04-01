<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

let form = ref({
  name: "",
  email: "",
  password: "",
  photo: "",
});

const router = useRouter();

const getPhoto = () => {
  let photo = "/upload/image.png";
  if (form.value.photo) {
    if (form.value.photo.indexOf("base64") != -1) {
      photo = form.value.photo;
    } else {
      photo = "/upload/" + form.value.photo;
    }
  }

  return photo;
};

const updatePhoto = (e) => {
  let file = e.target.files[0];
  let reader = new FileReader();
  let limit = 1024 * 1024 * 2;

  if (file["size"] > limit) {
    return false;
  }

  reader.onload = (file) => {
    form.value.photo = reader.result;
  };

  reader.readAsDataURL(file);
};

const saveContato = () => {
  const formData = new FormData();

  formData.append("name", form.value.name);
  formData.append("email", form.value.email);
  formData.append("password", form.value.password);
  formData.append("photo", form.value.photo);

  axios
    .post("/api/add_contato/", formData)
    .then((response) => {
      form.value.name = "";
      form.value.email = "";
      form.value.password = "";
      form.value.photo = "";

      router.push("/");

      toast.fire({
        icon: "success",
        title: "Contato Salvo",
      });
    })
    .catch((error) => {
      toast.fire({
        title: "O E-mail já existe",
        text: "Tente outro e-mail",
        icon: "warning",
      });
    });
};

const backHome = () => {
  router.push("/");
};
</script>

<template>
  <div class="container">
    <div class="products__create">
      <div
        class="
          products__create__titlebar
          dflex
          justify-content-between
          align-items-center
        "
      >
        <div class="products__create__titlebar--item">
          <h1 class="my-1">Adicionar Contato</h1>
        </div>
        <div class="products__create__titlebar--item">
          <button class="btn btn-secondary ml-1" @click="saveContato()">
            Salvar
          </button>
        </div>
      </div>

      <div class="products__create__cardWrapper mt-2">
        <div class="products__create__main">
          <div class="products__create__main--addInfo card py-2 px-2 bg-white">
            <p class="mb-1">Nome</p>
            <input type="text" class="input" v-model="form.name" />

            <p class="my-1">E-mail</p>
            <input type="text" class="input" v-model="form.email" />

            <p class="my-1">Senha</p>
            <input type="text" class="input" v-model="form.password" />

            <div class="products__create__main--media--images mt-2">
              <ul
                class="
                  products__create__main--media--images--list
                  list-unstyled
                "
              >
                <li class="products__create__main--media--images--item">
                  <div
                    class="
                      products__create__main--media--images--item--imgWrapper
                    "
                  >
                    <img
                      class="products__create__main--media--images--item--img"
                      :src="getPhoto()"
                      alt=""
                    />
                  </div>
                </li>
                <!-- upload image small -->
                <li class="products__create__main--media--images--item">
                  <form
                    class="products__create__main--media--images--item--form"
                  >
                    <label
                      class="
                        products__create__main--media--images--item--form--label
                      "
                      for="myfile"
                      >Adicionar Imagem</label
                    >
                    <input
                      class="
                        products__create__main--media--images--item--form--input
                      "
                      type="file"
                      id="myfile"
                      @change="updatePhoto"
                    />
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="dflex justify-content-between align-items-center my-3">
        <p></p>
        <button class="btn btn-secondary" @click="backHome">Voltar</button>
      </div>
    </div>
  </div>
</template>