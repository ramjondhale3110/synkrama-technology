// $(document).ready(function() {
//     $(document).on('click', '', function() {
//         const searchTerm = $('input[name="searchDealer"]').val();
//         if (searchTerm != '') {
//             $.ajax({
//                 url: "<?= base_url('home/getDealerDetails') ?>",
//                 method: "POST",
//                 data: {
//                     searchTerm: searchTerm
//                 },
//                 success: function(response) {
//                     console.log(response);
//                 }
//             });
//         }
//     });
// });