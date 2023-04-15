
    document.addEventListener("DOMContentLoaded", function(){

        let formulario = document.querySelector('.forms');
        let calendarEl = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            hiddenDays: [ 0, 6 ],
            headerToolbar: {
                left: 'prev, next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek, listWeek'
            },

            dateClick: function(info) {
                $("#exampleModal").modal("show");
            }
        });
        calendar.render();

        document.getElementById("save").addEventListener("click", function (){
            //get info
         
         const datos = new FormData(formulario);
         
            axios.post("http://127.0.0.1:8000/evento/evento/agregar", datos)
            .then((response) => {
                $("#exampleModal").modal("hide");
            }).catch(
                error=> {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                }
            )

        });
    })
