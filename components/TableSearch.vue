<template>
  <div>
    <b-table
      :checked-rows.sync="checkedRows"
      :checkable="checkable"
      :loading="isLoading"
      :paginated="paginated"
      :per-page="perPage"
      :striped="true"
      :hoverable="true"
      default-sort="name"
      :data="searchtable"
    >
      <div slot="empty">ข้อมูลการรับบริการ</div>
      <template slot-scope="props">
        <!-- <b-table-column label="HN" field="hn" sortable>
          {{ props.row.hn }}
        </b-table-column> -->
        <b-table-column label="วันที่บริการ" field="opddate" sortable>
          {{ props.row.opddate }}
        </b-table-column>
        <b-table-column label="ห้องตรวจ" field="halfplace" sortable>
          {{ props.row.halfplace }}
        </b-table-column>

        <b-table-column
          custom-key="actions"
          label="รายละเอียด"
          class="is-actions-cell"
        >
          <div class="buttons is-right">
            <button
              class="button is-small is-primary"
              type="button"
              @click="detail(props.row)"
            >
              <b-icon icon="account-details" size="is-small" />
            </button>
          </div>
        </b-table-column>
      </template>

      <section slot="empty" class="section">
        <div class="content has-text-grey has-text-centered">
          <template v-if="isLoading">
            <p>
              <b-icon icon="dots-horizontal" size="is-large" />
            </p>
            <p>Fetching data...</p>
          </template>
          <template v-else>
            <p>
              <b-icon icon="ballot-outline" size="is-large" />
            </p>
            <p>ไม่พบข้อมูล</p>
          </template>
        </div>
      </section>
    </b-table>
  </div>
</template>

<script>
export default {
  name: 'TableSearch',
  components: {},
  props: {
    searchtable: {
      type: String,
      default: null,
    },
    isModalActive: {
      type: Boolean,
      default: null,
    },
    trashObject: {
      type: String,
      default: null,
    },
    isLoading: {
      type: Boolean,
      default: null,
    },
    paginated: {
      type: Boolean,
      default: null,
    },
  },
  data() {
    return {
      isModalActive: false,
      isLoading: false,
      paginated: false,
      perPage: 10,
    }
  },
  computed: {},
  mounted() {},
  methods: {
    detail(row) {
      this.$emit(
        'detail',

        { opd_no: row.opdno }
      )
    },
  },
}
</script>
