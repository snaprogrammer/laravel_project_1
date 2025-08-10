<template>
  <div>
    <h2>Content Page</h2>
    <ul>
      <li
        v-for="item in contentData"
        :key="item.id"
        @click="openModal(item.id)"
        style="cursor:pointer;"
      >
        <h3>{{ item.title }}</h3>
        <p>{{ item.description }}</p>
      </li>
    </ul>

    <!-- Modal -->
    <div
      v-if="showModal && modalContent && modalContent.id"
      class="modal-overlay"
      @click.self="closeModal"
    >
      <div class="modal-content">
        <h3>{{ modalContent.title }}</h3>
        <p>{{ modalContent.full_description || modalContent.description }}</p>
        <button @click="closeModal">Close</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      contentData: [],
      showModal: false,
      modalContent: {
        id: null,
        title: "",
        description: "",
        full_description: "",
      },
    };
  },
  mounted() {
    // Load the list of content - access paginated data array via res.data.data
    axios
      .get("/api/contents")
      .then((res) => {
        this.contentData = res.data.data; // <-- Important: paginated data is inside data.data
      })
      .catch((err) => console.error(err));
  },
  methods: {
    openModal(id) {
      // Load full content detail by ID
      axios
        .get(`/api/contents/${id}`)
        .then((res) => {
          if (res.data) {
            this.modalContent = res.data;
            this.showModal = true;
          } else {
            console.error("Content not found");
          }
        })
        .catch((err) => console.error(err));
    },
    closeModal() {
      this.showModal = false;
      this.modalContent = {
        id: null,
        title: "",
        description: "",
        full_description: "",
      };
    },
  },
};
</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: white;
  padding: 20px;
  max-width: 400px;
  border-radius: 6px;
}
.modal-content button {
  margin-top: 15px;
}
li:hover {
  background-color: #f0f0f0;
}
</style>