<template>
  <div>
    <div class v-show="oparation_permission">
      <div class="card my-4">
        <div class="card-header" style="background: darkblue">
          <h2 style="color:white;text-transform:uppercase">Round three completed</h2>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- <th>Client status</th> -->
                <th>Round three</th>
                <th>Assigned to</th>
                <th>Done at</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="rone in getRoundThree" :key="rone.id">
                <td>{{rone.first_name}} {{rone.last_name}}</td>
                <td>{{rone.email}}</td>
                <td>{{rone.number}}</td>
                <td>{{rone.isR_two_done|ronedone}}</td>
                <td>{{rone.assignedTo}}</td>
                <td>{{rone.created_at|momentTime}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div
      v-show="!oparation_permission"
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
      oparation_ok: "",
    };
  },
  computed: {
    ...mapGetters(["getRoundThree"]),
    oparation_permission() {
      return (this.oparation_ok = this.$parent.oparation_ok);
    },
  },
  methods: {},
  mounted() {
    this.$store.dispatch("roundThreeAction");
    // this.$store.dispatch("settingAction");
  },
};
</script>