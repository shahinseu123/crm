<template>
  <div id="hi">
    <div class v-show="client_permission">
      <div class="card my-4">
        <div class="card-header" style="background: darkblue">
          <h2 style="color:white;text-transform:uppercase">Clients</h2>
        </div>
        <div class="card-body">
          <!-- ------------------------ -->
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Activity</th>
                  <!-- <th>Address</th> -->
                  <th>Client status</th>
                  <th>Active Status</th>
                  <th>R1</th>
                  <th>R2</th>
                  <th>R3</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="lead in getClients" :key="lead.id">
                  <td>
                    <div style="min-width:120px">{{lead.first_name}} {{lead.last_name}}</div>
                  </td>
                  <td>{{lead.email}}</td>
                  <!-- <td>{{lead.number}}</td> -->
                  <!-- <td>Dhaka, bagladesh, 1212</td> -->
                  <td>
                    <div style="width:150px">
                      <a
                        data-toggle="tooltip"
                        title="Send to Activity"
                        @click="sendToActivity(lead)"
                        class="lead-btn"
                        href="#"
                        v-show="lead.isActivity === 0"
                      >Start Work</a>
                      <a
                        data-toggle="tooltip"
                        title="Send to Lead"
                        @click="sendActivityToLead(lead.id)"
                        class="lead-btn-red"
                        href="#"
                        v-show="lead.isActivity === 1"
                      >Working</a>
                    </div>
                  </td>
                  <td>
                    <a
                      data-toggle="tooltip"
                      title="Make lead"
                      @click="makeLead(lead.id)"
                      class="lead-btn"
                      href="#"
                    >{{lead.isLead|isleads}}</a>
                  </td>
                  <td>
                    <a
                      v-show="lead.isActive === 1"
                      class="lead-btn"
                      href="#"
                      @click="makeInActive(lead)"
                    >{{lead.isActive|isactive}}</a>
                    <a
                      v-show="lead.isActive === 0"
                      class="lead-btn-red"
                      href="#"
                      @click="makeActive(lead.id)"
                    >{{lead.isActive|isactive}}</a>
                  </td>
                  <td v-show="lead.isR_one_done === 1">
                    <a
                      @click="makeRoneNotDone(lead)"
                      data-toggle="tooltip"
                      title="Make not done"
                      class="thump"
                      href="#"
                    >
                      <i class="far fa-thumbs-up"></i>
                    </a>
                  </td>
                  <td v-show="lead.isR_one_done === 0">
                    <a
                      @click="makeRoneDone(lead.id)"
                      data-toggle="tooltip"
                      title="Make done"
                      class="thump-d"
                      href="#"
                    >
                      <!-- <i class="far fa-thumbs-down"></i> -->
                      <i class="fas fa-sync"></i>
                    </a>
                  </td>
                  <td v-show="lead.isR_two_done === 1">
                    <a
                      @click="makeRtwoNotDone(lead)"
                      data-toggle="tooltip"
                      title="Make not done"
                      class="thump"
                      href="#"
                    >
                      <i class="far fa-thumbs-up"></i>
                    </a>
                  </td>
                  <td v-show="lead.isR_two_done === 0">
                    <a
                      @click="makeRtwoDone(lead)"
                      data-toggle="tooltip"
                      title="Make done"
                      class="thump-d"
                      href="#"
                    >
                      <i class="far fa-thumbs-down"></i>
                    </a>
                  </td>
                  <td v-show="lead.isR_three_done === 1">
                    <a
                      @click="makeRthreeNotDone(lead.id)"
                      data-toggle="tooltip"
                      title="Make not done"
                      class="thump"
                      href="#"
                    >
                      <i class="far fa-thumbs-up"></i>
                    </a>
                  </td>
                  <td v-show="lead.isR_three_done === 0">
                    <a
                      @click="makeRthreeDone(lead)"
                      data-toggle="tooltip"
                      title="Make done"
                      class="thump-d"
                      href="#"
                    >
                      <i class="far fa-thumbs-down"></i>
                    </a>
                  </td>
                  <td>
                    <div style="width:140px">
                      <a
                        data-toggle="tooltip"
                        title="Edit"
                        class="lead-btn-or"
                        style
                        href
                        @click.prevent="editClient(lead.id)"
                      >
                        <i class="far fa-edit blue"></i>
                      </a>
                      <a
                        data-toggle="tooltip"
                        title="View"
                        class="lead-btn-or"
                        @click.prevent="showClient(lead.id)"
                        href
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
                      <a
                        v-show="client_doc_permission"
                        data-toggle="modal"
                        data-target="#addFileModal"
                        title="Add file"
                        class="lead-btn-or"
                        href="#"
                      >
                        <i class="far fa-file-word purple"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div
              class="modal fade"
              id="addFileModal"
              tabindex="-1"
              role="dialog"
              aria-labelledby="addFileModalLabel"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addFileModalLabel">Add Documents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- <form>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">ID card</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" />
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Social Security Number</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" />
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Proof of Address</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" />
                      </div>
                    </form>-->
                    <ImageUploader></ImageUploader>
                  </div>
                  <!-- <div class="modal-footer"> -->
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <!-- <button type="button" class="lead-btn">
                      <i class="far fa-file-word mr-2"></i>ADD
                  </button>-->
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      style="text-align:center;background:white; height:84%;width:100%"
      v-show="!client_permission"
    >
      <img style="width:50%" src="img/vector/404.jpg" alt />
    </div>
  </div>
</template>

<script>
import ImageUploader from "./ImageUploader";
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      client_ok: "",
      check_activity_ready_to_work_ok: "",
      check_client_to_lead_ok: "",
      check_client_active_to_inactive_ok: "",
      check_r_one_done_not_done_ok: "",
      check_r_two_done_not_done_ok: "",
      check_r_three_done_not_done_ok: "",
      check_client_edit_ok: "",
      check_client_show_ok: "",
      check_client_delete_ok: "",
      check_client_adddoc_ok: "",
    };
  },
  components: {
    ImageUploader,
  },
  computed: {
    ...mapGetters(["getClients"]),
    client_permission() {
      return (this.client_ok = this.$parent.client_ok);
    },
    client_ready_to_work_permission() {
      return (this.check_activity_ready_to_work_ok = this.$parent.check_activity_ready_to_work_ok);
    },
    client_to_lead_permission() {
      return (this.check_client_to_lead_ok = this.$parent.check_client_to_lead_ok);
    },
    client_active_to_inactive_permission() {
      return (this.check_client_active_to_inactive_ok = this.$parent.check_client_active_to_inactive_ok);
    },
    client_r_one_done_not_done_permission() {
      return (this.check_r_one_done_not_done_ok = this.$parent.check_r_one_done_not_done_ok);
    },
    client_r_two_done_not_done_permission() {
      return (this.check_r_two_done_not_done_ok = this.$parent.check_r_two_done_not_done_ok);
    },
    client_r_three_done_not_done_permission() {
      return (this.check_r_three_done_not_done_ok = this.$parent.check_r_three_done_not_done_ok);
    },
    client_edit_permission() {
      return (this.check_client_edit_ok = this.$parent.check_client_edit_ok);
    },
    client_show_permission() {
      return (this.check_client_show_ok = this.$parent.check_client_show_ok);
    },
    client_delete_permission() {
      return (this.check_client_delete_ok = this.$parent.check_client_delete_ok);
    },
    client_doc_permission() {
      return (this.check_client_adddoc_ok = this.$parent.check_client_adddoc_ok);
    },
  },
  methods: {
    showClient(id) {
      if (this.client_show_permission) {
        this.$router.push({
          name: "ShowClient",
          params: { data: this.client_show_permission, lead_id: id },
        });
      } else {
        this.$toastr.e("You are not authorize to show client");
      }
    },
    editClient(id) {
      if (this.client_edit_permission) {
        this.$router.push({
          name: "EditClient",
          params: { data: this.client_edit_permission, lead_id: id },
        });
      } else {
        this.$toastr.e("You are not authorize to edit client");
      }
    },
    deleteLead(id) {
      if (this.client_delete_permission) {
        axios
          .delete(`api/leads/${id}`)
          .then(() => {
            Bus.$emit("Fired");
            this.$toastr.s("Client deleted successfully");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to delete client");
      }
    },
    makeRthreeDone(lead) {
      if (this.client_r_three_done_not_done_permission) {
        if (lead.isR_one_done && lead.isR_two_done) {
          axios
            .get(`api/makerthreedone/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => console.log(err));
        } else {
          this.$toastr.e("Round two is not done yet");
        }
      } else {
        this.$toastr.e("You are not authorized for this action ");
      }
    },
    makeRthreeNotDone(id) {
      if (this.client_r_three_done_not_done_permission) {
        axios
          .get(`api/makerthreenotdone/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorized for this action ");
      }
    },
    makeRtwoDone(lead) {
      if (this.client_r_two_done_not_done_permission) {
        if (lead.isR_one_done) {
          axios
            .get(`api/makertwodone/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => console.log(err));
        } else {
          this.$toastr.e("Round one is not done yet");
        }
      } else {
        this.$toastr.e("You are not authorized for this action ");
      }
    },
    makeRtwoNotDone(lead) {
      if (this.client_r_two_done_not_done_permission) {
        if (!lead.isR_three_done) {
          axios
            .get(`api/makertwonotdone/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => console.log(err));
        } else {
          this.$toastr.e(
            "Round two can not be undone, where round three is done"
          );
        }
      } else {
        this.$toastr.e("You are not authorized for this action ");
      }
    },
    makeRoneDone(id) {
      if (this.client_r_one_done_not_done_permission) {
        axios
          .get(`api/makeronedone/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorized for this action");
      }
    },
    makeRoneNotDone(lead) {
      if (this.client_r_one_done_not_done_permission) {
        if (!lead.isR_two_done && !lead.isR_three_done) {
          axios
            .get(`api/makeronenotdone/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => {
              console.log(err);
            });
        } else {
          this.$toastr.e(
            "Round one can not be undone, where round two or round three is done"
          );
        }
      } else {
        this.$toastr.e("You are not authorized for this action");
      }
    },

    makeLead(id) {
      if (this.client_to_lead_permission) {
        axios
          .get(`api/makelead/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorized to change client status");
      }
    },
    makeActive(id) {
      if (this.client_active_to_inactive_permission) {
        axios
          .get(`api/makeactive/${id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorized to change client state");
      }
    },
    makeInActive(lead) {
      if (this.client_active_to_inactive_permission) {
        if (!lead.isActivity) {
          axios
            .get(`api/makeinactive/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => console.log(err));
        } else {
          this.$toastr.e("Client is in working activity");
        }
      } else {
        this.$toastr.e("You are not authorized to change client state");
      }
    },
    sendActivityToLead(id) {
      if (this.client_ready_to_work_permission) {
        axios
          .get(`api/sendActivityToLead/${id}`)
          .then(() => {                                                   
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorize to change activity");
      }
    },
    sendToActivity(lead) {
      if (lead.isActive) {
        if (this.client_ready_to_work_permission) {
          axios
            .get(`api/send-to-activity/${lead.id}`)
            .then(() => {
              Bus.$emit("Fired");
            })
            .catch((err) => console.log(err));
        } else {
          this.$toastr.e("You are not authorize to change activity");
        }
      } else {
        this.$toastr.e("Client Inactive");
      }
    },
  },
  created() {
    this.$store.dispatch("actionClient");
    this.$store.dispatch("settingAction");
    Bus.$on("Fired", () => {
      this.$store.dispatch("actionClient");
    });
    // setTimeout(() => {
    //   this.check_if_okay();
    // }, 1000);
  },
};
</script>

<style lang="scss" scoped>
@import "~vue-toastr/src/vue-toastr.scss";
#hi {
  background-color: #ffffff;
}
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
.thump {
  padding: 6px 9px;

  text-align: center;
  background: darkblue;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.thump-d {
  padding: 6px 9px;

  text-align: center;
  background: #ef5350;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.fa-sync {
  animation: rolling 1s infinite linear;
}
@keyframes rolling {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>