<template>
  <div class>
    <div class="card my-4">
      <div class="card-header" style="background:darkblue">
        <h3 style="color:white;text-transform:uppercase" v-show="!editMode">Add Lead</h3>
        <h3 style="color:white;text-transform:uppercase" v-show="editMode">Edit Lead</h3>
      </div>

      <div class="card-body">
        <form @submit.prevent="editMode ? updateLead() : createLeads()">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="first_name">
                  First name
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.first_name"
                  type="text"
                  name="first_name"
                  placeholder="Enter first name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('first_name') }"
                  required
                />
                <has-error :form="form" field="first_name"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="middle_name">
                  Middle name
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.middle_name"
                  type="text"
                  name="middle_name"
                  placeholder="Enter middle name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('middle_name') }"
                />
                <has-error :form="form" field="middle_name"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="last_name">
                  Last name
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.last_name"
                  type="text"
                  name="last_name"
                  placeholder="Enter last name"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('last_name') }"
                  required
                />
                <has-error :form="form" field="last_name"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">
                  Email
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.email"
                  type="email"
                  name="email"
                  placeholder="Enter email"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                  required
                />
                <has-error :form="form" field="email"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="number">
                  Phone number
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.number"
                  type="number"
                  name="number"
                  placeholder="Enter number"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('number') }"
                />
                <has-error :form="form" field="number"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="dob">
                  Date of birth
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.dob"
                  type="date"
                  name="dob"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('dob') }"
                />
                <has-error :form="form" field="dob"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="ssn">
                  Social Security Number
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.ssn"
                  type="number"
                  name="ssn"
                  class="form-control"
                  placeholder="4 digit of ssn"
                  :class="{ 'is-invalid': form.errors.has('ssn') }"
                />
                <has-error :form="form" field="ssn"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="street_address">
                  Street address
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.street_address"
                  type="text"
                  name="street_address"
                  class="form-control"
                  placeholder="Enter street address"
                  :class="{ 'is-invalid': form.errors.has('street_address') }"
                  required
                />
                <has-error :form="form" field="street_address"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="city">
                  City
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.city"
                  type="text"
                  name="city"
                  class="form-control"
                  placeholder="Enter city name"
                  :class="{ 'is-invalid': form.errors.has('city') }"
                  required
                />
                <has-error :form="form" field="city"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="state">
                  State
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.state"
                  type="text"
                  name="state"
                  class="form-control"
                  placeholder="Enter state name"
                  :class="{ 'is-invalid': form.errors.has('state') }"
                  required
                />
                <has-error :form="form" field="state"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="zip">
                  Zip code
                  <span class="red">*</span>
                </label>
                <input
                  v-model="form.zip"
                  type="number"
                  name="zip"
                  class="form-control"
                  placeholder="Enter zip code"
                  :class="{ 'is-invalid': form.errors.has('zip') }"
                  required
                />
                <has-error :form="form" field="zip"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="credit_monitoring_site">
                  Credit monitoring
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.credit_monitoring_site"
                  type="text"
                  name="credit_monitoring_site"
                  class="form-control"
                  placeholder="Credit monitoring site"
                  :class="{ 'is-invalid': form.errors.has('credit_monitoring_site') }"
                />
                <has-error :form="form" field="credit_monitoring_site"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="credit_monitoring_id">
                  Credit monitoring username
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.credit_monitoring_id"
                  type="text"
                  name="credit_monitoring_id"
                  class="form-control"
                  placeholder="Credit monitoring id"
                  :class="{ 'is-invalid': form.errors.has('credit_monitoring_id') }"
                />
                <has-error :form="form" field="credit_monitoring_id"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="credit_monitoring_id">
                  Credit monitoring password
                  <!-- <span class="red">*</span> -->
                </label>
                <input
                  v-model="form.credit_monitoring_pass"
                  type="password"
                  name="credit_monitoring_pass"
                  class="form-control"
                  placeholder="Credit monitoring password"
                  :class="{ 'is-invalid': form.errors.has('credit_monitoring_pass') }"
                />
                <has-error :form="form" field="credit_monitoring_pass"></has-error>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="credit_monitoring_id">
                  Assigned to
                  <!-- <span class="red">*</span> -->
                </label>
                <select
                  class="form-control"
                  name="assignedTo"
                  id="assignedTo"
                  v-model="form.assignedTo"
                  :class="{ 'is-invalid': form.errors.has('assignedTo') }"
                >
                  <option value>--Assigned to--</option>
                  <option
                    v-for="user in getAllUsers"
                    :key="user.id"
                    :value="user.name"
                  >{{user.name}}</option>
                </select>
                <has-error :form="form" field="assignedTo"></has-error>
              </div>
            </div>
            <div class="mt-3">
              <button v-show="!editMode" type="submit" class="lead-btn m-3">SUBMIT</button>
              <button v-show="editMode" type="submit" class="lead-btn m-3">UPDATE</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      lead_id: this.$route.params.lead_id,
      errors_all: {},
      singleLead: {},
      editMode: false,
      form: new Form({
        id: "",
        first_name: "",
        middle_name: "",
        last_name: "",
        email: "",
        number: "",
        dob: "",
        ssn: "",
        assignedTo: "",
        street_address: "",
        city: "",
        state: "",
        zip: "",
        credit_monitoring_site: "",
        credit_monitoring_id: "",
        credit_monitoring_pass: "",
      }),
    };
  },
  computed: {
    ...mapGetters(["getAllUsers"]),
  },
  methods: {
    updateLead() {
      axios
        .put(`/api/leads/${this.form.id}`, this.form)
        .then(() => {
          swal.fire("Updated!", "Your file has been updated.", "success");
          this.$router.push("/leads");
        })
        .catch((err) => console.log(err));
    },

    createLeads() {
      axios
        .post("api/leads", this.form)
        .then(() => {
          this.$router.push("/leads");
          swal.fire({
            position: "top-end",
            type: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          // Bus.$emit("rootbus");
        })
        .catch(({ response }) => {
          // console.log(response.data.errors.city);
          // this.errors_all = response.data;
        });
    },
    loadSingleLead() {
      axios
        .get(`/api/leads/${this.lead_id}`)
        .then(({ data }) => {
          // console.log(data);
          this.singleLead = data;
          this.form.fill(data);
          this.editMode = true;
        })
        .catch((err) => console.log(err));
    },
  },
  created() {
    if (this.lead_id) {
      this.loadSingleLead();
    }
    this.$store.dispatch("getuser");
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
</style>