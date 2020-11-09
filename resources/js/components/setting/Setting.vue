<template>
  <div>
    <div class="card mt-4" v-show="setting_permission">
      <div class="card-header" style="background: darkblue">
        <h2 style="color:white">Settings</h2>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="card p-4 box">
              <p>
                <span class="red">**</span>Select each checkbox to give
                <br />a user access permission for each module
                <span class="red">**</span>
              </p>
              <h5>
                Select User
                <span class="red">*</span>
              </h5>

              <form @submit.prevent="createAccess()">
                <div class="form-group">
                  <select
                    required
                    name="client"
                    id="client"
                    class="form-control"
                    v-model="check_form.user_id"
                  >
                    <option selected>--Select users--</option>
                    <option
                      v-for="user in getAllUsers"
                      :key="user.id"
                      :value="user.id"
                    >{{user.name}}</option>
                  </select>
                </div>
                <p>Select Modules</p>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_users"
                    value="users"
                    id="check_users"
                  />
                  <label class="form-check-label" for="check_users">User</label>
                  <span style="margin-left: 150px">Select User Options</span>
                  <button
                    type="button"
                    class="lead-btn"
                    @click="showUserOptions"
                    style="padding: 3px 3px;border-radius:50%;margin-left: 31px;"
                  >
                    <i class="fas fa-check"></i>
                  </button>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead"
                    value="leads"
                    id="check_lead"
                  />

                  <label class="form-check-label" for="check_lead">Lead</label>
                  <span style="margin-left: 149px">Select Lead Options</span>
                  <button
                    type="button"
                    class="lead-btn"
                    @click="showLeadOptions"
                    style="padding: 3px 3px;border-radius:50%;margin-left: 31px;"
                  >
                    <i class="fas fa-check"></i>
                  </button>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client"
                    value="leads"
                    id="check_client"
                  />

                  <label class="form-check-label" for="check_activity">Client</label>
                  <span style="margin-left: 143px">Select Client Options</span>
                  <button
                    type="button"
                    class="lead-btn"
                    @click="showClientOptions"
                    style="padding: 3px 3px;border-radius:50%;margin-left: 26px;"
                  >
                    <i class="fas fa-check"></i>
                  </button>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_activity"
                    value
                    id="check_activity"
                  />
                  <label class="form-check-label" for="check_activity">Activity</label>
                  <span style="margin-left: 131px;">Select Activity Options</span>
                  <button
                    type="button"
                    class="lead-btn"
                    @click="showActivityOptions"
                    style="padding: 3px 3px;border-radius:50%;margin-left: 15px;"
                  >
                    <i class="fas fa-check"></i>
                  </button>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_oparation"
                    value="oparation"
                    id="check_oparation"
                  />
                  <label class="form-check-label" for="check_oparation">Oparation</label>

                  <!-- <span style="margin-left: 116px">Select Oparation Options</span> -->
                  <!-- <button
                    type="button"
                    class="lead-btn"
                    @click="showOparationOptions"
                    style="padding: 3px 3px;border-radius:50%"
                  >
                    <i class="fas fa-check"></i>
                  </button>-->
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_setting"
                    value="settings"
                    id="check_setting"
                  />

                  <label class="form-check-label" for="check_setting">Settings</label>
                </div>

                <button type="submit" class="lead-btn mt-4">CREATE</button>
              </form>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user-options" v-show="show_user_option">
              <div class="p-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_user_create"
                    id="check_user_create"
                  />
                  <label class="form-check-label" for="check_user_edit">Create User</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_user_edit"
                    id="check_user_edit"
                  />
                  <label class="form-check-label" for="check_user_edit">Edit User</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_user_delete"
                    id="check_user_delete"
                  />
                  <label class="form-check-label" for="check_user_delete">Delete User</label>
                </div>
              </div>
            </div>
            <div class="card card-user-options" v-show="show_lead_option">
              <div class="p-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_create"
                    id="check_lead_create"
                  />
                  <label class="form-check-label" for="check_lead_edit">Create Lead</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_edit"
                    id="check_lead_edit"
                  />
                  <label class="form-check-label" for="check_lead_edit">Edit Lead</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_delete"
                    id="check_lead_delete"
                  />
                  <label class="form-check-label" for="check_lead_delete">Delete Lead</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_to_client"
                    id="check_lead_to_client"
                  />
                  <label class="form-check-label" for="check_lead_to_client">Lead to Client</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_show"
                    id="check_lead_show"
                  />
                  <label class="form-check-label" for="check_lead_show">Show Lead</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_active_to_inactive"
                    id="check_active_to_inactive"
                  />
                  <label class="form-check-label" for="check_lead_show">Active to Inactive</label>
                </div>
                <!-- <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_lead_to_client"
                    id="check_lead_to_client"
                  />
                  <label class="form-check-label" for="check_lead_show">Active to Inactive</label>
                </div>-->
              </div>
            </div>
            <div class="card card-user-options" v-show="show_client_option">
              <div class="p-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_edit"
                    id="check_client_edit"
                  />
                  <label class="form-check-label" for="check_client_edit">Edit Client</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_delete"
                    id="check_client_delete"
                  />
                  <label class="form-check-label" for="check_client_delete">Delete Client</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_show"
                    id="check_client_show"
                  />
                  <label class="form-check-label" for="check_client_show">Show Client</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_adddoc"
                    id="check_client_adddoc"
                  />
                  <label class="form-check-label" for="check_client_adddoc">Add Document</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_activity_ready_to_work"
                    id="check_activity_ready_to_work"
                  />
                  <label class="form-check-label" for="check_client_adddoc">Activity changing</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_to_lead"
                    id="check_client_to_lead"
                  />
                  <label class="form-check-label" for="check_client_adddoc">Client to Lead</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_active_to_inactive"
                    id="check_client_active_to_inactive"
                  />
                  <label class="form-check-label" for="check_client_adddoc">Active to Inactive</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_r_one_done_not_done"
                    id="check_r_one_done_not_done"
                  />
                  <label
                    class="form-check-label"
                    for="check_client_adddoc"
                  >Round one done and undone</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_r_two_done_not_done"
                    id="check_r_two_done_not_done"
                  />
                  <label
                    class="form-check-label"
                    for="check_client_adddoc"
                  >Round two done and undone</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_r_three_done_not_done"
                    id="check_r_three_done_not_done"
                  />
                  <label
                    class="form-check-label"
                    for="check_client_adddoc"
                  >Round three done and undone</label>
                </div>
              </div>
            </div>
            <div class="card card-user-options" v-show="show_activity_option">
              <div class="p-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_activity_working_ready"
                    id="check_activity_working_ready"
                  />
                  <label
                    class="form-check-label"
                    for="check_activity_working_ready"
                  >Ready to Working</label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_activity_show"
                    id="check_activity_show"
                  />
                  <label class="form-check-label" for="check_activity_show">Show documents</label>
                </div>
              </div>
            </div>
            <!-- <div class="card card-user-options" v-show="show_oparation_option">
              <div class="p-4">
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    v-model="check_form.check_client_edit"
                    id="check_client_edit"
                  />
                  <label class="form-check-label" for="check_client_edit">Edit Client</label>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>
    </div>
    <div
      style="text-align:center;background:white; height:84%;width:100%"
      v-show="!setting_permission"
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
      show_user_option: false,
      show_lead_option: false,
      show_client_option: false,
      show_activity_option: false,
      show_oparation_option: false,

      authuser: "",
      setting_ok: "",
      check_form: {
        user_id: false,
        check_oparation: false,
        check_setting: false,
        check_lead: false,
        check_client: false,
        check_users: false,
        check_activity: false,
        // ----------------
        check_user_delete: false,
        check_user_edit: false,
        check_user_create: false,
        // -------------------
        check_lead_edit: false,
        check_lead_delete: false,
        check_lead_show: false,
        check_lead_create: false,
        check_lead_to_client: false,
        check_active_to_inactive: false,
        // -----------------------
        check_client_edit: false,
        check_client_delete: false,
        check_client_show: false,
        check_client_adddoc: false,
        check_activity_ready_to_work: false,
        check_client_to_lead: false,
        check_client_active_to_inactive: false,
        check_r_one_done_not_done: false,
        check_r_two_done_not_done: false,
        check_r_three_done_not_done: false,
        // ----------------------------------
        check_activity_working_ready: false,
        check_activity_show: false,
      },
    };
  },
  computed: {
    ...mapGetters(["getAllUsers"]),
    setting_permission() {
      return (this.setting_ok = this.$parent.setting_ok);
    },
  },
  // beforeRouteEnter(to, from, next) {
  //   this.setting_ok =
  // },
  methods: {
    createAccess() {
      axios
        .post("api/access", this.check_form)
        .then(() => {
          this.$toastr.s("Permission created successfully");
          // swal.fire({
          //   position: "top-end",
          //   type: "success",
          //   title: "Your work has been saved",
          //   showConfirmButton: false,
          //   timer: 1500,
          // });
          Bus.$emit("rootbus");
        })
        .catch((err) => {
          this.$toastr.e("Maybe you missied something");
        });
    },
    showUserOptions() {
      this.show_user_option = true;
    },
    showLeadOptions() {
      this.show_lead_option = true;
    },
    showClientOptions() {
      this.show_client_option = true;
    },
    showActivityOptions() {
      this.show_activity_option = true;
    },
    showOparationOptions() {
      this.show_oparation_option = true;
    },
  },
  created() {
    this.$store.dispatch("getuser");
    // this.$store.dispatch("settingAction");
    axios
      .get("api/getauthuser")
      .then(({ data }) => {
        this.authuser = data;
      })
      .catch((err) => console.log(err));
  },
};
</script>

<style scoped lang="scss">
@import "~vue-toastr/src/vue-toastr.scss";
.box {
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
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
.card-user-options {
  background: darkblue;
}
.card-user-options label {
  color: white;
}
</style>