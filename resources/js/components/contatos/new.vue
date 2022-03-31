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
          <h1 class="my-1">Add Product</h1>
        </div>
        <div class="products__create__titlebar--item">
          <button class="btn btn-secondary ml-1">Save</button>
        </div>
      </div>

      <div class="products__create__cardWrapper mt-2">
        <div class="products__create__main">
          <div class="products__create__main--addInfo card py-2 px-2 bg-white">
            <p class="mb-1">Nome</p>
            <input type="text" class="input" />

            <p class="my-1">E-mail</p>
            <input type="text" class="input" />

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
                      >Add Image</label
                    >
                    <input
                      class="
                        products__create__main--media--images--item--form--input
                      "
                      type="file"
                      id="myfile"
                    />
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="products__create__sidebar">
          <div class="card py-2 px-2 bg-white">
            <div class="my-3">
              <p>Senha</p>
              <input type="text" class="input" />
            </div>
            <hr />

            <div class="my-3">
              <p>Telefone</p>
              <input type="text" class="input" />
            </div>
            <hr />
          </div>
        </div>
      </div>
      <!-- Footer Bar -->
      <div class="dflex justify-content-between align-items-center my-3">
        <p></p>
        <button class="btn btn-secondary">Save</button>
      </div>
    </div>
  </div>
</template>