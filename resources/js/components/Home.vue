<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6 mt-5">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{getLeadsAll.length}}</h3>
            <p>Leads</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="/leads" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
      <div class="col-lg-3 col-6 mt-5">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>{{getClients.length}}</h3>

            <p>Clients</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="clients" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
      <div class="col-lg-3 col-6 mt-5">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3>{{getRoundOne.length}}</h3>

            <p>Round one done</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="/roundonecomplete" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
      <div class="col-lg-3 col-6 mt-5">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 style="color:white">{{getAllRoundTwo.length}}</h3>

            <p style="color:white">Round two done</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="/roundtwocomplete" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
      <div class="col-lg-3 col-6 mt-5">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{getRoundThree.length}}</h3>

            <p>Round three done</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <router-link to="/roundthreecomplete" class="small-box-footer">
            More info
            <i class="fas fa-arrow-circle-right"></i>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      deshboard_ok: this.$parent.deshboard_ok,
    };
  },
  computed: {
    ...mapGetters([
      "getLeadsAll",
      "getClients",
      "getRoundOne",
      "getAllRoundTwo",
      "getRoundThree",
    ]),
  },
  methods: {},
  mounted() {
    this.$store.dispatch("getLeads");
    this.$store.dispatch("actionClient");
    this.$store.dispatch("round_oneActions");
    this.$store.dispatch("actionRoundTwo");
    this.$store.dispatch("roundThreeAction");
    // this.$store.dispatch("settingAction");
  },
};
</script>
