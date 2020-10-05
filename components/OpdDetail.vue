<template>
  <div>
    <section class="section is-main-section hero is-Light">
      <b-message type="is-warning">
        <div class="columns">
          <div class="column is-2">
            <b-field label="เลขที่รับบริการ">
              <b-input
                v-model="opddetail.opdno"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-2">
            <b-field label="HN">
              <b-input
                v-model="opddetail.hn"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-3">
            <b-field label="ชื่อ-สกุล">
              <b-input
                v-model="opddetail.name"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-2">
            <b-field label="วันที่รับบริการ">
              <b-input
                v-model="opddetail.opddate"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-3">
            <b-field label="เลขประจำตัวประชาชน">
              <b-input
                v-model="opddetail.idcard"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
        </div>
      </b-message>

      <b-message type="is-warning">
        <div class="columns">
          <div class="column is-2">
            <b-field label="สิทธิ">
              <b-input
                v-model="opddetail.rightname"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-1">
            <b-field label="อายุ">
              <b-input
                v-model="opddetail.age"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-1">
            <b-field label="เพศ">
              <b-input
                v-model="opddetail.sex"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-3">
            <b-field label="แพทย์">
              <b-input
                v-model="opddetail.docname"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-2">
            <b-field label="ห้องตรวจ">
              <b-input
                v-model="opddetail.halfplace"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
          <div class="column is-2">
            <b-field label="ประเภทผู้ป่วย">
              <b-input
                v-model="opddetail.visittype"
                custom-class="is-static"
                readonly
              />
            </b-field>
          </div>
        </div>
      </b-message>
      <b-message type="is-info">
        <div class="columns is-desktop">
          <div class="column">อาการทั่วไป</div>
        </div>
      </b-message>
      <b-message type="is-danger">
        <div class="columns is-desktop">
          <div class="column">โรค</div>
          <div class="column">ยา</div>
        </div>
        <div class="columns is-desktop">
          <div class="column">หัตถการ</div>
        </div>
      </b-message>
    </section>
  </div>
</template>

<script>
export default {
  name: 'Opddetail',
  components: {},
  props: {
    opddetail: {
      type: [],
      default: null,
    },
  },
  data() {
    return {}
  },
  computed: {},
  mounted() {},
  methods: {},
}
</script>
