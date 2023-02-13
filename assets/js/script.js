// $(document).ready(function () {
//     $(document).on('change', 'input[name="searchDealer"]', function () {
//         const baseUrl = $('input[name="baseUrl"]').val();
//         const searchTerm = $(this).val();
//         console.log(searchTerm);
//         if (searchTerm != '') {
//             $.ajax({
//                 url: baseUrl + "home/getDealerDetails",
//                 method: "POST",
//                 data: {
//                     searchTerm: searchTerm
//                 },
//                 success: function (response) {
//                     console.log(response);
//                 }
//             });
//         }
//     });
// });