$(document).ready(function() {

    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount: 5,
        searchResultLimit: 5,
        renderChoiceLimit: 5
    });

});


// tinymce.init({
//     selector: 'textarea#exampleInputDesc',
//     plugins: 'print preview tinydrive searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',

//     codesample_languages: [{
//             text: 'HTML/XML',
//             value: 'markup'
//         },
//         {
//             text: 'JavaScript',
//             value: 'javascript'
//         },
//         {
//             text: 'CSS',
//             value: 'css'
//         },
//         {
//             text: 'PHP',
//             value: 'php'
//         },
//         {
//             text: 'Ruby',
//             value: 'ruby'
//         },
//         {
//             text: 'Python',
//             value: 'python'
//         },
//         {
//             text: 'Java',
//             value: 'java'
//         },
//         {
//             text: 'C',
//             value: 'c'
//         },
//         {
//             text: 'C#',
//             value: 'csharp'
//         },
//         {
//             text: 'C++',
//             value: 'cpp'
//         }
//     ],
//     toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',

//     tinycomments_author: 'Author name',
//     external_filemanager_path: "/filemanager/",
//     filemanager_title: "Responsive Filemanager",
//     external_plugins: {
//         "filemanager": "/filemanager/plugin.min.js"
//     },
//     tinycomments_mode: 'embedded',
// });

var faqs_row = 0;

function addfaqs() {
    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" class="form-control" name="file_title[]" placeholder="t??n file"></td>';
    html += '<td><input type="file" name="file_upload[]"></td>';
    // html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
    html += '<td class="mt-10"><button class="badge badge-danger bg-danger" onclick="$(\'#faqs-row' + faqs_row +
        '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
}

//click remove file when edit post 
var arr_id = [];

let x = [...$('.js-span')];
x.forEach(item =>{
    item.addEventListener("click", function() {
        let input_querry = document.querySelector('#file_close');
        let id = item.id;
        arr_id.push(id);
        input_querry.value = JSON.stringify(arr_id);
        item.parentNode.remove();
    });
})