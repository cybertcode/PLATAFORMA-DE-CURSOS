document.getElementById("title").addEventListener("keyup", slugChange);

function slugChange() {
    title = document.getElementById("title").value;
    document.getElementById("slug").value = slug(title);
}
// del profe del curso
function slug(str) {
    var $slug = "";

    var trimmed = str.trim(str);
    $slug = trimmed
        .replace(/[^a-z0-9-]/gi, "-")
        .replace(/-+/g, "-")
        .replace(/^-|-$/g, "");
    return $slug.toLowerCase();
}
// function slug(str) {
//     var $slug = '';
//     var trimmed = str.trim(str);
//     $slug = trimmed.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ')
//         .toLowerCase()
//         .replace(/^\s+|\s+$/gm, '')
//         .replace(/\s+/g, '-');
//     return $slug.toLowerCase();
// }

/**********************
 * Activamos ckeditor *
 **********************/
ClassicEditor.create(document.querySelector("#description"), {
    toolbar: ["heading", "|", "bold", "italic", "link", "blockQuote"],
    heading: {
        options: [
            {
                model: "paragraph",
                title: "Paragraph",
                class: "ck-heading_paragraph",
            },
            {
                model: "heading1",
                view: "h1",
                title: "Heading 1",
                class: "ck-heading_heading1",
            },
            {
                model: "heading2",
                view: "h2",
                title: "Heading 2",
                class: "ck-heading_heading2",
            },
        ],
    },
}).catch((error) => {
    console.log(error);
});
/***********************
 * Para cambiar imagen *
 ***********************/
document.getElementById("file").addEventListener("change", cambiarImagen);

function cambiarImagen(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = (event) => {
        document
            .getElementById("picture")
            .setAttribute("src", event.target.result);
    };
    reader.readAsDataURL(file);
}
