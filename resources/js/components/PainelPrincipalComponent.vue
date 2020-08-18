<template>
    <div id="painel-principal" class="container">
        <!-- Modal-Verifica-Conta-Slado -->
        <div class="modal fade" id="verificaConta" tabindex="-1" role="dialog" aria-labelledby="verificaConta" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form v-on:submit.prevent="verificaConta">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informe sua conta</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="conta">Conta:</label>
                                <input v-model="newConta.conta" type="text" id="conta" name="conta" maxlength="255" :class="['form-control', erros.conta ? 'is-invalid' : '']" placeholder="000-000" autofocus="autofocus">
                                <span v-if="erros.conta" :class="['label text-danger']">{{ erros.conta[0] }}</span>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal-Verifica-Conta-Slado -->

        <!-- Modal-Conta-Slado -->
        <div class="modal fade" id="saldo" tabindex="-1" role="dialog" aria-labelledby="saldo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" v-if="contaCorrente" v-for="c in contaCorrente">                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">CONTA: {{c.conta}}</h5>                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <span class="h2">SALDO: {{c.saldo}}</span>                         
                        </div>                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                    </div>                   
                </div>
            </div>
        </div>
        <!-- Modal-Conta-Slado -->

        <!-- Modal-Verifica-Conta-Deposito -->
        <div class="modal fade" id="verificaDeposito" tabindex="-1" role="dialog" aria-labelledby="verificaDeposito" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form v-on:submit.prevent="verificaDeposito">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informe sua conta</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="conta">Conta:</label>
                                <input v-model="newConta.conta" type="text" id="conta" name="conta" maxlength="255" :class="['form-control', erros.conta ? 'is-invalid' : '']" placeholder="000-000" autofocus="autofocus">
                                <span v-if="erros.conta" :class="['label text-danger']">{{ erros.conta[0] }}</span>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal-Verifica-Conta-Deposito -->

        <!-- Modal-Conta-Deposito -->
        <div class="modal fade" id="depositar" tabindex="-1" role="dialog" aria-labelledby="depositar" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" v-if="contaCorrenteDeposito">  
                    <form v-on:submit.prevent="depositar(contaCorrenteDeposito.id)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">CONTA: {{contaCorrenteDeposito.conta}}</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <span class="h2">SALDO: {{contaCorrenteDeposito.saldo}}</span>                         
                            </div> 
                            <div class="form-group">
                                <label for="conta">DEPOSITAR:</label>
                                <input v-model="deposito.valor" type="text" id="valor" name="valor" maxlength="255" :class="['form-control', erros.valor ? 'is-invalid' : '']" placeholder="0,0" autofocus="autofocus">
                                <span v-if="erros.valor" :class="['label text-danger']">{{ erros.valor[0] }}</span>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                        </div>   
                    </form>               
                </div>
            </div>
        </div>
        <!-- Modal-Conta-Deposito -->

        <!-- Modal-Verifica-Conta-Saque -->
        <div class="modal fade" id="verificaSaque" tabindex="-1" role="dialog" aria-labelledby="verificaSaque" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form v-on:submit.prevent="verificaSaque">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Informe sua conta</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="conta">Conta:</label>
                                <input v-model="newConta.conta" type="text" id="conta" name="conta" maxlength="255" :class="['form-control', erros.conta ? 'is-invalid' : '']" placeholder="000-000" autofocus="autofocus">
                                <span v-if="erros.conta" :class="['label text-danger']">{{ erros.conta[0] }}</span>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal-Verifica-Conta-Saque -->

        <!-- Modal-Conta-Saque -->
        <div class="modal fade" id="sacar" tabindex="-1" role="dialog" aria-labelledby="sacar" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" v-if="contaCorrenteSaque">  
                    <form v-on:submit.prevent="sacar(contaCorrenteSaque.id)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">CONTA: {{contaCorrenteSaque.conta}}</h5>                    
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <span class="h2">SALDO: {{contaCorrenteSaque.saldo}}</span>                         
                            </div> 
                            <div class="form-group">
                                <label>SACAR:</label>
                                <input v-model="saque.valor" type="text" id="valor" name="valor" maxlength="255" :class="['form-control', erros.valor ? 'is-invalid' : '']" placeholder="0,0" autofocus="autofocus">
                                <span v-if="erros.valor" :class="['label text-danger']">{{ erros.valor[0] }}</span>
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SAIR</button>
                            <button type="submit" class="btn btn-primary">CONFIRMAR</button>
                        </div>   
                    </form>               
                </div>
            </div>
        </div>
        <!-- Modal-conta-Saque -->

        <div class="row justify-content-center">
            <img src="imagens/logo/logo-1.png" class="img-fluid" alt="Banco Capgemini">
        </div><!-- row justify-content-center -->

        <div class="row d-flex justify-content-around">                
            <div class="btn btn-warning text-body col-md-4" data-toggle="modal" data-target="#verificaConta">
                <i class="fas fa-search-dollar fa-7x"></i>
                <p class="text-center text-body h3 font-weight-bold">SALDO</p>
            </div>
            <div class="btn btn-primary text-body col-md-4 pb-2 pt-2" data-toggle="modal" data-target="#verificaSaque">
                <i class="fas fa-money-check-alt fa-7x text-body"></i>
                <p class="text-center text-body h3 font-weight-bold">SACAR</p>
            </div>
            <div class="btn btn-success text-body col-md-4" data-toggle="modal" data-target="#verificaDeposito">
                <i class="fas fa-piggy-bank fa-7x text-body"></i>
                <p class="tex-center text-body h3 font-weight-bold">DEPOSITAR</p>
            </div> 
        </div><!-- row d-flex justify-content-around -->
    </div>
</template>

<script>
    export default {

        data(){
            return{
                contaCorrente: [],
                contaCorrenteDeposito: [
                    'id',
                    'conta',
                    'saldo'
                ],
                contaCorrenteSaque: [
                    'id',
                    'conta',
                    'saldo'
                ],
                newConta: [
                    'conta'
                ],
                deposito: [
                    'valor'
                ],
                saque: [
                    'valor'
                ],
                erros: [],
                sucesso: false,
            }
        },

        mounted() {
           
        },

        methods:{  
            sacar: function($id){
                if (confirm('Deseja sacar o valor de R$' + this.saque.valor + '?')){
                    axios.put('/api/rest/sacar/' + $id, {       
                        valor: this.saque.valor             
                    })
                    .then(response => {
                        this.contaCorrenteSaque.saldo = response.data.saldo;
                        this.saque.valor = null;
                    })
                    .catch(error => {
                        if(error.response.status == 422){
                            this.erros = error.response.data.errors;
                            this.sucesso = false;
                        }
                        //console.log(error);
                    });
                }
            },

            depositar: function($id){
                if (confirm('Deseja depositar o valor de R$' + this.deposito.valor + '?')){
                    axios.put('/api/rest/depositar/' + $id, {       
                        valor: this.deposito.valor             
                    })
                    .then(response => {
                        this.contaCorrenteDeposito.saldo = response.data.saldo;
                        this.deposito.valor = null;
                    })
                    .catch(error => {
                        if(error.response.status == 422){
                            this.erros = error.response.data.errors;
                            this.sucesso = false;
                        }
                        //console.log(error);
                    });
                }
            },

            verificaSaque: function(){
                axios.get('/api/rest/buscarConta/' + this.newConta.conta)
                .then(response => {
                    this.contaCorrenteSaque = response.data[0];
                    $().ready(function() {
                        setTimeout(function () {
                            $('#verificaSaque').modal('hide');
                        }, 10); // O valor é representado em milisegundos.
                    });
                    $().ready(function() {
                        setTimeout(function () {
                            $('#sacar').modal('show');
                        }, 50); // O valor é representado em milisegundos.
                    });
                })
                .catch(error => {                    
                    if(error.response.status == 422){
                        this.erros = error.response.data.errors;
                        this.sucesso = false;
                    }
                    //console.log(error);
                });
            },

            verificaDeposito: function(){
                axios.get('/api/rest/buscarConta/' + this.newConta.conta)
                .then(response => {
                    this.contaCorrenteDeposito = response.data[0];
                    $().ready(function() {
                        setTimeout(function () {
                            $('#verificaDeposito').modal('hide');
                        }, 10); // O valor é representado em milisegundos.
                    });
                    $().ready(function() {
                        setTimeout(function () {
                            $('#depositar').modal('show');
                        }, 50); // O valor é representado em milisegundos.
                    });
                })
                .catch(error => {                    
                    if(error.response.status == 422){
                        this.erros = error.response.data.errors;
                        this.sucesso = false;
                    }
                    //console.log(error);
                });
            },

            verificaConta: function(){
                axios.get('/api/rest/buscarConta/' + this.newConta.conta)
                .then(response => {
                    this.contaCorrente = response.data                   
                    $().ready(function() {
                        setTimeout(function () {
                            $('#verificaConta').modal('hide');
                        }, 10); // O valor é representado em milisegundos.
                    });
                    $().ready(function() {
                        setTimeout(function () {
                            $('#saldo').modal('show');
                        }, 50); // O valor é representado em milisegundos.
                    });
                })
                .catch(error => {                    
                    if(error.response.status == 422){
                        this.erros = error.response.data.errors;
                        this.sucesso = false;
                    }
                    //console.log(error);
                });
            }
        }
    }
</script>

<style>

    #painel-principal
    {
        padding-top: 1%;
    }

    #painel-principal img
    {
        width: 30%;
        height: auto;
    }

    #painel-principal.pp .btn i
    {
        font-weight: bolder;        
        font-size: 200%;
        font-family: open sans,sans-serif;
    }

    #painel-principal .pp .btn i
    {
        padding-top: 15%;
        padding-bottom: 10;
    }
</style>
