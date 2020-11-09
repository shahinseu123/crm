<template>
  <div>
    <div v-show="activity_permission">
      <div class="card mt-3">
        <div class="card-header" style="background:darkblue">
          <h2 style="color:#fff">Activity</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Assigned to</th>
                  <th>Activity</th>
                  <th>Client status</th>
                  <th>Active Status</th>
                  <th>R1</th>
                  <th>R2</th>
                  <th>R3</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="ac in activityGetter" :key="ac.id">
                  <td>
                    <div style="min-width:150px">{{ac.first_name}} {{ac.last_name}}</div>
                  </td>
                  <td>{{ac.email}}</td>
                  <td>
                    <div style="min-width:150px">{{ac.assignedTo}}</div>
                  </td>
                  <td>
                    <button
                      @click="makeactivitydone(ac)"
                      class="lead-btn-red"
                    >{{ac.isActivity|activityfilter}}</button>
                  </td>
                  <td>
                    <button
                      class="lead-btn"
                      style="background:#ef9a9a"
                      disabled
                    >{{ac.isLead|isleads}}</button>
                  </td>
                  <td>
                    <button
                      class="lead-btn"
                      disabled
                      style="background:#9575cd"
                    >{{ac.isActive|isactive}}</button>
                  </td>
                  <td>
                    <button
                      v-show="ac.isR_one_done"
                      disabled
                      class="thump"
                      style="background:#9575cd"
                    >
                      <i v-show="ac.isR_two_done" class="far fa-thumbs-up"></i>
                      <i v-show="!ac.isR_two_done" class="fas fa-sync"></i>
                    </button>
                    <button
                      v-show="!ac.isR_one_done"
                      disabled
                      class="thump-d"
                      style="background:#ef9a9a"
                    >
                      <i class="far fa-thumbs-down"></i>
                    </button>
                  </td>
                  <td>
                    <button
                      v-show="ac.isR_two_done"
                      disabled
                      class="thump"
                      style="background:#9575cd"
                    >
                      <i v-show="ac.isR_three_done" class="far fa-thumbs-up"></i>
                      <i v-show="!ac.isR_three_done" class="fas fa-sync"></i>
                    </button>
                    <button
                      v-show="!ac.isR_two_done"
                      disabled
                      class="thump-d"
                      style="background:#ef9a9a"
                    >
                      <i class="far fa-thumbs-down"></i>
                    </button>
                  </td>
                  <td>
                    <button
                      v-show="ac.isR_three_done"
                      disabled
                      class="thump"
                      style="background:#9575cd"
                    >
                      <!-- <i v-show="ac.isR_three_done" class="far fa-thumbs-up"></i> -->
                      <i v-show="ac.isR_three_done" class="fas fa-sync"></i>
                    </button>
                    <button
                      v-show="!ac.isR_three_done"
                      disabled
                      class="thump-d"
                      style="background:#ef9a9a"
                    >
                      <i class="far fa-thumbs-down"></i>
                    </button>
                  </td>
                  <!-- <td>
                  <a data-toggle="tooltip" title="Change to Client" class="lead-btn" href="#"></a>
                </td>
                <td>
                  <a data-toggle="tooltip" title="Change to Inactive" class="lead-btn" href="#"></a>
                  <a data-toggle="tooltip" title="Change to Active" class="lead-btn-red" href="#"></a>
                  </td>-->
                  <td>
                    <!-- <router-link
                  data-toggle="tooltip"
                  title="Edit"
                  class="lead-btn-or"
                  :to="`/editlead/${lead.id}`"
                >
                  <i class="far fa-edit blue"></i>
                    </router-link>-->
                    <a
                      data-toggle="tooltip"
                      title="View"
                      class="thump"
                      @click.prevent="showActivity(ac.id)"
                      style="margin-top:2px;padding: 6px 8px;background:white;"
                      href
                    >
                      <i class="far fa-eye green" style="margin-top: 9px;"></i>
                    </a>
                    <!-- <a
                  data-toggle="tooltip"
                  title="Delete"
                  @click="deleteLead(lead.id)"
                  class="lead-btn-or"
                  href="#"
                >
                  <i class="far fa-trash-alt red"></i>
                    </a>-->
                    <!-- <a data-toggle="tooltip" title="Add file" class="lead-btn-or" href="#"> -->
                    <!-- <i class="far fa-file-word purple"></i> -->
                    <!-- </a> -->
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div
      v-show="!activity_permission"
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
      activity_ok: "",
      check_activity_ready_to_work_ok: "",
      check_activity_show_ok: "",
    };
  },
  computed: {
    ...mapGetters(["activityGetter"]),
    activity_permission() {
      return (this.activity_ok = this.$parent.activity_ok);
    },
    activity_working_to_ready_to_work_permission() {
      return (this.check_activity_ready_to_work_ok = this.$parent.check_activity_ready_to_work_ok);
    },
    activity_show_permission() {
      return (this.check_activity_show_ok = this.$parent.check_activity_show_ok);
    },
  },
  methods: {
    showActivity(id) {
      if (this.activity_show_permission) {
        this.$router.push({
          name: "ShowActivity",
          params: { data: this.activity_show_permission, lead_id: id },
        });
      } else {
        this.$toastr.e("You are not authorized for this action");
      }
    },
    makeactivitydone(ac) {
      if (this.activity_working_to_ready_to_work_permission) {
        axios
          .get(`api/makeactivitydone/${ac.id}`)
          .then(() => {
            Bus.$emit("Fired");
          })
          .catch((err) => console.log(err));
      } else {
        this.$toastr.e("You are not authorized for this action");
      }
    },
  },
  created() {
    this.$store.dispatch("activityAction");
    Bus.$on("Fired", () => this.$store.dispatch("activityAction"));
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
.lead-btn-red {
  padding: 5px 30px;
  background: #ef5350;
  color: white;
  border: none;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.lead-btn-red:hover {
  text-decoration: none;
  color: white;
}
.thump {
  padding: 9px 9px;
  border: none;
  text-align: center;
  background: darkblue;
  color: white;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
}
.thump-d {
  padding: 9px 9px;
  border: none;
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