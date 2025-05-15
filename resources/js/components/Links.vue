<template>
<div class="container pb-4 mb-4">

<div class="row">
    <div class="col"><h5 class="mb-3"><a href="/" class="black-text">External Link Checker</a></h5></div>
    <div class="col text-right"><i><a href="https://shingimushipe.com" target="_blank">By Shingi</a></i></div>
</div>

  <div class="card">
    <div class="card-body pb-0">

      <div class="py-3">
            <div class="filter-container">
              <div class="filter-group">
                <div class="filter-option"><input @click="toggleFilter('status_3xx')" type="checkbox" id="status-3xx" value="3xx"><label for="status-3xx" class="mb-0">3XX</label></div>
                <div class="filter-option"><input @click="toggleFilter('status_4xx')" type="checkbox" id="status-4xx" value="4xx"><label for="status-4xx" class="mb-0">4XX</label></div>
                <div class="filter-option"><input @click="toggleFilter('status_5xx')" type="checkbox" id="status-5xx" value="5xx"><label for="status-5xx" class="mb-0">5XX</label></div>
                <div class="filter-option"><input @click="toggleFilter('operators')" type="checkbox" id="tour-operators" value="tour"><label class="mb-0" for="tour-operators">Tour Operators</label></div>
                <div class="filter-option"><input @click="toggleFilter('accommodations')" type="checkbox" id="accommodations" value="accommodation"><label class="mb-0" for="accommodations">Accommodations</label></div>
              </div>
            </div>
          </div>

      <div v-if="loading" class="text-center pt-2 pb-4"><i class="fas fa-spinner fa-spin"></i></div>

      <div v-else-if="links.length == 0 && 
      !filter.status_3xx && 
      !filter.status_4xx && 
      !filter.status_5xx && 
      !filter.operators && 
      !filter.accommodations" class="text-center pb-3">
        <div><b>No links have been checked</b></div>
        <div class="mt-2">Please run this command</div>
        <div class="mt-2"><code>vendor/bin/sail artisan check:links</code></div>
        <div class="mt-2"><a href="/" class="btn btn-success btn-sm px-3">Reload</a></div>
      </div>

      <div v-else-if="links.length == 0" class="text-center pb-3">
        <div>No links for this filter</div>
      </div>

        <div v-else>

          <div class="text-center pb-3">{{links.length}} links found</div>

          <!-- Desktop -->
          <table class="datatables-basic table d-none d-md-table">
          <thead class="thead-dark sticky-top">
                <tr>
                  <th class="first-left pl-3" width="20%">Type</th>
                  <th class="pl-3" width="20%">External Link</th>
                  <th class="pl-3" width="20%">Last Checked</th>
                  <th class="pl-3" width="20%">Status</th>
                  <th class="first-right pl-3" width="20%">Action</th>
                </tr>
              </thead>
          <tbody>
            <tr class="body2" v-for="(link, index) in links" :key="index.id">
              <td class="pl-3" width="20%">
                <i v-if="link.type == 'Accommodation'" class="fa-solid fa-house mr-2"></i>
                <i v-else class="fa-solid fa-user mr-2"></i>
                <b>{{link.type}}</b></td>
              <td class="pl-3" width="20%">
                <small>
                   <div><b>{{link.name}}</b></div>
                   <div><a :href="link.website" target="_blank">{{link.website}}</a></div>
                </small>
                </td>
              <td class="pl-3" width="20%"><timeago
                :datetime="link.last_checked"
                :auto-update="60"
                :title="formatDateMoment(link.last_checked)"></timeago></td>

              <td class="pl-3" width="20%"><span :class="`status `+getStatusClass(link.last_status)">{{link.last_status}}</span></td>

              <td class="pl-3" width="20%">
                <a href="#/" @click="showModalLinkHistory(link)" class="mr-3" title="Link history"><i class="fas fa-eye"></i></a>
                <a 
                href="#/"
                title="Check link"
                :class="`check_link_${link.id}`"
                @click="checkLink(link)"><i class="fas fa-search"></i></a>
              <span
                title="Checking link"
                id="checking"
                :class="`check_${link.id}`"><i class="fas fa-spinner fa-spin"></i></span>
              </td>       
            </tr>
          </tbody>
        </table>

        <!-- Mobile -->
        <table class="table d-md-none">
            <thead class="thead-dark">
                <tr>
                  <th class="first-left first-right text-center">Link</th>
                </tr>
              </thead>
          <tbody>
            <tr class="body" v-for="(link, index) in links" :key="index">
  
        <td class="pl-2 text-center">
            <div class="pt-2"><a href="link.website" target="_blank">{{link.name}}</a></div>
        </td>

            </tr>
          </tbody>
        </table>

        </div>

  </div>
  </div>
  <link-history ref="LinkHistory"></link-history>
  </div>
</template> 

<script>
export default {

  data() {
    return {
      links: [],
      loading: true,
      selectedLink: null,
      filter: {
        'status_3xx': false,
        'status_4xx': false,
        'status_5xx': false,
        'operators': false,
        'accommodations': false
      }
    };
  },

  created() {
    this.getLinks();
  },

  methods: {

    toggleFilter(filter) {
      this.filter[filter] = !this.filter[filter];
      this.getLinks();
    },

    showModalLinkHistory(link) {
      this.$refs.LinkHistory.getHistory(link);
      this.$bvModal.show(`bv-modal-link-history`);
    },

    checkLink(link) {

      // show loading spinner
      $(`.check_link_${link.id}`).hide();
      $(`.check_${link.id}`).addClass('display_unset');

      axios
        .post(`/links/check`, { website: link.website })
        .then((response) => {
            // show success message
            this.customAlert(response.data.message);
            this.getLinks();
        }).catch((error) => {
          // show error message
          this.customAlert(error.response.data.message);
        })
        .finally(() => {
          // hide loading spinner
          $(`.check_${link.id}`).removeClass('display_unset');
          $(`.check_link_${link.id}`).show();
        });
    },

    getLinks() {

      axios.post(`/links/list`, {
        filter: this.filter
      }).then((response) => {
        this.links = response.data;
      }).catch((error) => {
        this.customAlert(error.response.data.message);
      }).finally(() => {
        this.loading = false;
      });

    },

  },
};
</script>