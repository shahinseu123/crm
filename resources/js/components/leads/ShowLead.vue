<template>
  <section>
    <div class>
      <div class="card my-4" style="background: #1A237E">
        <div class="card-header">
          <h2 style="color:white">Lead</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card p-4">
                <div class="d-flex">
                  <ul class="detailul">
                    <li>
                      <i class="far fa-user mr-2" style="color:#19217A"></i>Name
                    </li>
                    <li>
                      <i class="far fa-envelope mr-2" style="color:#19217A"></i>Email
                    </li>
                    <li>
                      <i class="fas fa-phone-square-alt mr-2" style="color:#19217A"></i>Phone
                    </li>
                    <li>
                      <i class="fas fa-calendar-check mr-2" style="color:#19217A"></i>Date of Birth
                    </li>
                    <li>
                      <i class="fab fa-artstation mr-2" style="color:#19217A"></i>Four digit of SSN
                    </li>
                    <li>
                      <i class="fas fa-address-book mr-2" style="color:#19217A"></i>Street address
                    </li>
                    <li>
                      <i class="fas fa-address-book mr-2" style="color:#19217A"></i>City, State, Zip
                    </li>
                    <li>
                      <i class="fab fa-battle-net mr-2" style="color:#19217A"></i>Credit monitoring
                    </li>
                    <li style="text-transform:capitalize">
                      <i class="fas fa-user-graduate mr-2" style="color:#19217A"></i>
                      {{singleLead.credit_monitoring_site}} Username
                    </li>
                    <li style="text-transform:capitalize">
                      <i class="fas fa-lock mr-2" style="color:#19217A"></i>
                      {{singleLead.credit_monitoring_site}} Password
                    </li>
                    <li>
                      <i class="fas fa-user-astronaut mr-2" style="color:#19217A"></i>Assigned To
                    </li>
                    <li>
                      <i class="fas fa-user-cog mr-2" style="color:#19217A"></i>Created By
                    </li>
                    <li>
                      <i class="far fa-registered mr-2" style="color:#19217A"></i>Registered At
                    </li>
                  </ul>
                  <ul class="detailul">
                    <li>{{singleLead.first_name}} {{singleLead.middle_name}} {{singleLead.last_name}}</li>
                    <li>{{singleLead.email ? singleLead.email: "---------------------"}}</li>
                    <li>{{singleLead.number ? singleLead.number: "---------------------"}}</li>
                    <li>{{singleLead.dob ? singleLead.dob: "---------------------"}}</li>
                    <li>{{singleLead.ssn ? singleLead.ssn: "---------------------"}}</li>
                    <li>{{singleLead.street_address ? singleLead.street_address: "---------------------"}}</li>
                    <li>{{singleLead.city}}, {{singleLead.state}}, {{singleLead.zip}}</li>
                    <li
                      style="text-transform: capitalize"
                    >{{singleLead.credit_monitoring_site ? singleLead.credit_monitoring_site: "---------------------"}}</li>
                    <li>{{singleLead.credit_monitoring_id ? singleLead.credit_monitoring_id: "---------------------"}}</li>
                    <li>{{singleLead.credit_monitoring_pass ? singleLead.credit_monitoring_pass: "---------------------"}}</li>
                    <li>{{singleLead.assignedTo}}</li>
                    <li>{{singleLead.createdBy}}</li>
                    <li>{{singleLead.created_at|momentTime}}</li>
                  </ul>
                </div>

                <!-- <h5>
                  <span style="background:yellow">Name:</span>
                  {{singleLead.first_name}} {{singleLead.middle_name}} {{singleLead.last_name}}
                </h5>
                <h6>
                  <span style="background:yellow">Email:</span>
                  {{singleLead.email}}
                </h6>
                <h6>
                  <span style="background:yellow">Phone:</span>
                  {{singleLead.number}}
                </h6>
                <h6>
                  <span style="background:yellow">Date of Birth:</span>
                  {{singleLead.dob}}
                </h6>
                <h6>
                  <span style="background:yellow">Four digit of SSN:</span>
                  {{singleLead.ssn}}
                </h6>
                <h6>
                  <span style="background:yellow">Street address:</span>
                  {{singleLead.street_address}}
                </h6>
                <h6>
                  <span style="background:yellow">City, State, Zip:</span>
                  {{singleLead.city}} {{singleLead.state}} {{singleLead.zip}}
                </h6>
                <h6>
                  <span style="background:yellow">Credit monitoring:</span>
                  {{singleLead.credit_monitoring_site}}
                </h6>
                <h6>
                  <span style="background:yellow">Username:</span>
                  {{singleLead.credit_monitoring_id}}
                </h6>
                <h6>
                  <span style="background:yellow">Password:</span>
                  {{singleLead.credit_monitoring_pass}}
                </h6>-->
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="card">
                <img src alt />
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      lead_id: this.$route.params.lead_id,
      singleLead: {},
    };
  },
  methods: {
    loadSingleLead() {
      axios
        .get(`/api/leads/${this.lead_id}`)
        .then(({ data }) => {
          // console.log(data);
          this.singleLead = data;
          this.editMode = true;
        })
        .catch((err) => console.log(err));
    },
  },
  created() {
    this.loadSingleLead();
    // this.$store.dispatch("settingAction");
  },
};
</script>

<style scoped>
.detailul {
  /* display: inline-block; */
  /* padding: 0;
  margin: 0; */
  list-style-type: none;
  margin-left: 30px;
  padding: 0;
}
.detailul li {
  padding: 5px;
  /* background: #e8e8e8;
  margin: 2px;
  -webkit-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 1px 1px 5px 0px rgba(0, 0, 0, 0.75); */
}
</style>