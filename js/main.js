//img dispay const
const img_container = document.getElementById("img-container");
const input_img = document.getElementById("input-file");
const img_preview = document.getElementById("img-preview");


    input_img.addEventListener("change",function(){

        const file = this.files[0];
        if(file){

            const reader = new FileReader();
                img_preview.style.display="block";
                reader.addEventListener("load",function(){
                    img_preview.setAttribute("src", this.result);
                });
                reader.readAsDataURL(file);
        }

    });
//end page admin

