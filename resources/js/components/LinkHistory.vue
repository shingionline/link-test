<template>
  <div>
    <b-modal id="bv-modal-link-history" size="lg" hide-footer>
      <template #modal-title>Link History</template>

      <div v-if="loading" class="text-center pt-2 pb-4"><i class="fas fa-spinner fa-spin"></i></div>

      <div v-else-if="results.length == 0">No history found</div>

      <div v-else>

        <div class="pb-3" v-if="link">
          <h6 class="mb-0 pb-0">
            <i v-if="link.type == 'Accommodation'" class="fa-solid fa-house mr-2"></i>
            <i v-else class="fa-solid fa-user mr-2"></i>{{link.name}}
          </h6>
          <div><small><a :href="link.website" target="_blank">{{link.website}}</a></small></div>
        </div>

          <table class="datatables-basic table d-none d-md-table">
          <thead class="thead-dark">
                <tr>
                  <th class="first-left pl-3" width="30%">Date</th>
                  <th class="pl-3" width="15%">Status</th>
                  <th class="first-right pl-3" width="55%">Redirect URL</th>
                </tr>
              </thead>
          <tbody>
            <tr class="body2" v-for="(result, index) in results" :key="index.id">
              <td class="pl-3"><timeago
                :datetime="result.created_at"
                :auto-update="60"
                :title="formatDateMoment(result.created_at)"></timeago></td>    
              <td class="pl-3"><span :class="`status `+getStatusClass(result.status)">{{result.status}}</span></td>    
              <td class="pl-3"><small><a :href="result.redirect_url" target="_blank">{{result.redirect_url}}</a></small></td>    
            </tr>
          </tbody>
        </table>

    </div>

    </b-modal>
  </div>
</template> 

<script>
export default {
  data() {
    return {
      loading: false,
      results: [],
      currentLink: null,
      link: null,
    };
  },

  methods: {

    hideModalLinkHistory() {
      this.$bvModal.hide(`bv-modal-link-history`);
    },

    getHistory(link) {

        this.link = link;
        this.loading = true;

        axios.post('/links/history', {
          website: link.website,
        })
        .then((response) => {
            this.results = response.data;
        }).catch((error) => {
            customAlert(error.response.data.message);
        }).finally(() => {
            this.loading = false;
        });

      },
  },
};
</script>