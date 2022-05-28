function init() {
    $.ajax({
        url: "../controllers/ramaisController.php",
        type: "GET",
        success: (data) => {
            //console.log(data);
            obj = JSON.parse(data);
            ramal = obj.info_ramais;
    
            if($('#cartoes')) {
                $('#cartoes').empty();
            }
    
            for(let i in ramal) {
                if(ramal[i].status == 'indisponivel') {
                    $('#cartoes').append(`<div class="cartao inativo border-${ramal[i].status}">
                                        <div>${ramal[i].username}</div>
                                        <div>Ramal: (${ramal[i].ramal})</div>
                                        <div>Status: ${ramal[i].status}</div>
                                        <span class="${ramal[i].status} icone-status"></span>
                                        </div>`);
                } else {
                    $('#cartoes').append(`<div class="cartao border-${ramal[i].status}">
                                        <div>${ramal[i].username}</div>
                                        <div>Ramal: (${ramal[i].ramal})</div>
                                        <div>Status: ${ramal[i].status}</div>
                                        <span class="${ramal[i].status} icone-status"></span>
                                        </div>`);
                }
            }

            monitor = obj.info_monitor;

            if($('#informacoes')) {
                $('#informacoes').empty();
            }

            $('#informacoes').append(`<h5>Disponiveis: ${monitor.disponivel} </h5>
                                <h5>Indisponiveis: ${monitor.indisponivel} </h5>
                                <h5>Em pausa: ${monitor.pausa} </h5>
                                <h5>Chamando: ${monitor.chamando} </h5>
                                <h5>Em chamada: ${monitor.ocupado} </h5>`);
        },
        error: function(){
            console.log("Errouu!")
        }
    });
}

init();
setInterval(() => { init(); }, 10000);