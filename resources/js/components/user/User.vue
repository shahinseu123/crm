<template>
  <div>
    <div class v-show="user_permission">
      <div class="row justify-content-center">
        <!-- <button class="btn btn-danger" @click="countUser" >send</button> -->
        <div class="col-md-12">
          <div class="card my-4">
            <div class="card-header" style="background:darkblue">
              <h2 style="color:white;text-transform:uppercase">User's info</h2>
              <!-- <ul v-for="set in getSettings" :key="set.id">
              <li>{{set.check_oparation}}</li>
              <li>{{set.check_setting}}</li>
              <li>{{set.check_lead}}</li>
              <li>{{set.check_users}}</li>
              <li>{{set.check_dashboard}}</li>
              </ul>-->

              <!-- <p class="teal"><span>Total User's: </span>{{totalUsers}}</p> -->
              <div class="card-tools">
                <button class="lead-btn" @click="createModel">
                  <i class="fas fa-user-plus fa-fw"></i> Add User
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Number</th>
                      <th>Type</th>
                      <th>Registared at</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in getAllUsers" :key="user.id">
                      <td>{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.number}}</td>
                      <td>{{user.type}}</td>
                      <td>{{user.created_at}}</td>
                      <td>
                        <a class="lead-btn-or" @click="editModal(user)" href="#">
                          <i class="fas fa-edit fa-fw fontbig blue"></i>
                        </a>

                        <a class="lead-btn-or" @click="deleteUser(user.id)" href="#">
                          <i class="fas fa-trash-alt fa-fw fontbig red"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <!-- <div class="card-footer"></div> -->
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div
        class="modal fade"
        id="myModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" v-show="!editMode" id="exampleModalLabel">Add user's info</h5>
              <h5 class="modal-title" v-show="editMode" id="exampleModalLabel">Edit user's info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form @submit.prevent="editMode ? updateUser() : createUser()">
              <div class="modal-body">
                <div class="form-group">
                  <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    placeholder="Enter name"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  />
                  <has-error :form="form" field="name"></has-error>
                </div>
                <div class="form-group">
                  <input
                    v-model="form.email"
                    type="email"
                    name="email"
                    placeholder="Enter email"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  />
                  <has-error :form="form" field="email"></has-error>
                </div>
                <div class="form-group">
                  <input
                    v-model="form.number"
                    type="number"
                    name="number"
                    placeholder="Enter Number"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('number') }"
                  />
                  <has-error :form="form" field="number"></has-error>
                </div>

                <div class="form-group">
                  <select
                    name="type"
                    v-model="form.type"
                    id="type"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('type') }"
                  >
                    <option value>Select User Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                  <has-error :form="form" field="type"></has-error>
                </div>
                <div class="form-group">
                  <input
                    v-model="form.password"
                    type="password"
                    name="password"
                    placeholder="Enter password"
                    class="form-control"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  />
                  <has-error :form="form" field="password"></has-error>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="close-btn" data-dismiss="modal">Close</button>
                <button class="lead-btn" type="submit" v-show="editMode">
                  <i class="fas fa-user-plus fa-fw"></i> Update
                </button>
                <button class="lead-btn" type="submit" v-show="!editMode">
                  <i class="fas fa-user-plus fa-fw"></i> Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div
      style="text-align:center;background:white; height:84%;width:100%"
      v-show="!user_permission"
    >
      <img style="width:50%" src="img/vector/404.jpg" alt />
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      editMode: false,
      users: {},
      setting: [],
      totalUsers: null,
      users_ok: "",
      check_user_delete_ok: "",
      check_user_edit_ok: "",
      check_user_create_ok: "",
      form: new Form({
        id: "",
        name: "",
        email: "",
        type: "",
        number: "",
        password: "",
        // photo: "",
      }),
    };
  },
  computed: {
    ...mapGetters(["getAllUsers", "getSettings"]),
    user_permission() {
      return (this.users_ok = this.$parent.users_ok);
    },
    delete_user_permission() {
      return (this.check_user_delete_ok = this.$parent.check_user_delete_ok);
    },
    edit_user_permission() {
      return (this.check_user_edit_ok = this.$parent.check_user_edit_ok);
    },
    create_user_permission() {
      return (this.check_user_create_ok = this.$parent.check_user_create_ok);
    },
  },
  methods: {
    deleteUser(id) {
      if (this.delete_user_permission) {
        axios
          .delete(`api/user/${id}`)
          .then(() => {
            this.$toastr.s("User created successfully");
            Bus.$emit("rootbus");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authosize to delete");
      }
    },
    updateUser() {
      axios
        .put(`api/user/${this.form.id}`, this.form)
        .then(() => {
          this.$toastr.s("User updated successfully");
          $("#myModal").modal("hide");
          Bus.$emit("rootbus");
        })
        .catch((err) => console.log(err));
    },
    editModal(data) {
      if (this.edit_user_permission) {
        this.editMode = true;
        $("#myModal").modal("show");
        this.form.fill(data);
      } else {
        this.$toastr.e("You are not authosize to edit");
      }
    },
    createModel() {
      if (this.create_user_permission) {
        this.editMode = false;
        this.form.reset();
        $("#myModal").modal("show");
      } else {
        this.$toastr.e("You are not authosize to create user");
      }
    },
    createUser() {
      this.form
        .post("api/user")
        .then(() => {
          $("#myModal").modal("hide");
          // swal.fire({
          //   position: "top-end",
          //   type: "success",
          //   title: "Your work has been saved",
          //   showConfirmButton: false,
          //   timer: 1500,
          // });
          this.$toastr.s("User created successfuly");
          Bus.$emit("rootbus");
        })
        .catch(() => {
          this.$toastr.e("Maybe you have missed something!!");
        });
    },
  },
  created() {
    this.$store.dispatch("getuser");
    Bus.$on("rootbus", () => {
      this.$store.dispatch("getuser");
    });
    // this.$store.dispatch("settingAction");
    console.log("Component created.");
  },
};
</script>
<style scoped lang="scss">
@import "~vue-toastr/src/vue-toastr.scss";
.lead-btn {
  padding: 5px 30px;
  background: #1a237e;
  color: white;
  border: none;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn:hover {
  text-decoration: none;
  color: white;
}
.close-btn {
  padding: 5px 30px;
  background: #ff5252;
  color: white;
  border: none;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn-or {
  padding: 8px;

  text-align: center;
  background: white;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn-or:hover {
  text-decoration: none;
  color: white;
}
</style>