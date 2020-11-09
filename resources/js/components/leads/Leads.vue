<template>
  <div>
    <div class v-show="leads_permission">
      <div class="card my-4">
        <div class="card-header" style="background:darkblue">
          <h3 style="color:white;text-transform:uppercase">Leads</h3>
          <div class="card-tools">
            <button @click="createLeads" class="lead-btn">
              <i class="fas fa-user-tag mr-2"></i>ADD LEADS
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
                  <!-- <th>Activity</th> -->
                  <th>Client status</th>
                  <th>Active Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="lead in getLeadsAll" :key="lead.id">
                  <td>
                    <div
                      style="min-width:150px"
                    >{{lead.first_name}} {{lead.middle_name}} {{lead.last_name}}</div>
                  </td>
                  <td>{{lead.email}}</td>
                  <td>{{lead.number}}</td>
                  <!-- <td>
                  <a
                    data-toggle="tooltip"
                    title="Send to Activity"
                    @click="sendToActivity(lead.id)"
                    class="lead-btn"
                    href="#"
                    v-show="lead.isActivity === 0"
                  >Activity</a>
                  <a
                    data-toggle="tooltip"
                    title="Send to Lead"
                    @click="sendActivityToLead(lead.id)"
                    class="lead-btn-red"
                    href="#"
                    v-show="lead.isActivity === 1"
                  >Working</a>
                  </td>-->
                  <td>
                    <a
                      data-toggle="tooltip"
                      title="Change to Client"
                      @click="makeClient(lead.id)"
                      class="lead-btn"
                      href="#"
                    >{{lead.isLead|isleads}}</a>
                  </td>
                  <td>
                    <a
                      data-toggle="tooltip"
                      title="Change to Inactive"
                      v-show="lead.isActive === 1"
                      class="lead-btn"
                      href="#"
                      @click="makeInActive(lead.id)"
                    >{{lead.isActive|isactive}}</a>
                    <a
                      data-toggle="tooltip"
                      title="Change to Active"
                      v-show="lead.isActive === 0"
                      class="lead-btn-red"
                      href="#"
                      @click="makeActive(lead.id)"
                    >{{lead.isActive|isactive}}</a>
                  </td>
                  <td>
                    <div style="width:140px">
                      <a
                        data-toggle="tooltip"
                        title="Edit"
                        class="lead-btn-or"
                        href
                        @click.prevent="editLeads(lead.id)"
                      >
                        <i class="far fa-edit blue"></i>
                      </a>
                      <a
                        data-toggle="tooltip"
                        title="View"
                        class="lead-btn-or"
                        href
                        @click.prevent="showEachLead(lead.id)"
                      >
                        <i class="far fa-eye green"></i>
                      </a>
                      <a
                        data-toggle="tooltip"
                        title="Delete"
                        @click="deleteLead(lead.id)"
                        class="lead-btn-or"
                        href="#"
                      >
                        <i class="far fa-trash-alt red"></i>
                      </a>
                      <!-- <a data-toggle="tooltip" title="Add file" class="lead-btn-or" href="#">
                        <i class="far fa-file-word purple"></i>
                      </a>-->
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div
      v-show="!leads_permission"
      style="text-align:center;background:white; height:84%;width:100%"
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
      activeStatus: true,
      lead_ok: "",
      check_lead_create_ok: "",
      check_lead_to_client_ok: "",
      check_active_to_inactive_ok: "",
      check_lead_edit_ok: "",
      check_lead_show_ok: "",
      check_lead_delete_ok: "",
    };
  },
  computed: {
    ...mapGetters(["getLeadsAll"]),
    leads_permission() {
      return (this.lead_ok = this.$parent.lead_ok);
    },
    lead_create_permission() {
      return (this.check_lead_create_ok = this.$parent.check_lead_create_ok);
    },
    lead_to_client_permission() {
      return (this.check_lead_to_client_ok = this.$parent.check_lead_to_client_ok);
    },
    active_to_inactive_permission() {
      return (this.check_active_to_inactive_ok = this.$parent.check_active_to_inactive_ok);
    },
    edit_lead_permission() {
      return (this.check_lead_edit_ok = this.$parent.check_lead_edit_ok);
    },
    show_lead_permission() {
      return (this.check_lead_show_ok = this.$parent.check_lead_show_ok);
    },
    delete_lead_permission() {
      return (this.check_lead_delete_ok = this.$parent.check_lead_delete_ok);
    },
  },
  methods: {
    showEachLead(id) {
      if (this.show_lead_permission) {
        this.$router.push({
          name: "ShowLead",
          params: { data: this.show_lead_permission, lead_id: id },
        });
      } else {
        this.$toastr.e("You are not authorize to show leads documents");
      }
    },
    editLeads(id) {
      if (this.edit_lead_permission) {
        this.$router.push({
          name: "AddLead",
          params: { data: this.edit_lead_permission, lead_id: id },
        });
      } else {
        this.$toastr.e("You are not authorize to edit leads");
      }
    },
    createLeads() {
      if (this.lead_create_permission) {
        // console.log("Hello");
        this.$router.push({
          name: "AddLead",
          params: { data: this.lead_create_permission },
        });
      } else {
        this.$toastr.e("You are not authorize to create leads");
      }
    },
    // sendActivityToLead(id) {
    //   axios
    //     .get(`api/sendActivityToLead/${id}`)
    //     .then(() => {
    //       Bus.$emit("Fired");
    //     })
    //     .catch((err) => console.log(err));
    // },
    // sendToActivity(id) {
    //   axios
    //     .get(`api/send-to-activity/${id}`)
    //     .then(() => {
    //       Bus.$emit("Fired");
    //     })
    //     .catch((err) => console.log(err));
    // },
    deleteLead(id) {
      if (this.delete_lead_permission) {
        axios
          .delete(`api/leads/${id}`)
          .then(() => {
            Bus.$emit("Fired");
            this.$toastr.s("Data deleted successfully");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to delete lead");
      }
    },
    makeClient(id) {
      if (this.lead_to_client_permission) {
        axios
          .get(`api/makeclient/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to change leads state");
      }
    },
    makeActive(id) {
      if (this.active_to_inactive_permission) {
        axios
          .get(`api/makeactive/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to change active status");
      }
    },
    makeInActive(id) {
      if (this.active_to_inactive_permission) {
        axios
          .get(`api/makeinactive/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to change active status");
      }
    },
  },
  created() {
    this.$store.dispatch("getLeads");
    Bus.$on("Fired", () => this.$store.dispatch("getLeads"));
    // this.$store.dispatch("settingAction");
  },
};
</script>

<style scoped>
.lead-btn {
  padding: 5px 30px;
  background: #1a237e;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn:hover {
  text-decoration: none;
  color: white;
}
.lead-btn-red {
  padding: 5px 30px;
  background: #ef5350;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn-red:hover {
  text-decoration: none;
  color: white;
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
.add-leads {
  padding: 9px 30px;
}
</style>