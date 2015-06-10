@extends('store.control_panel.template')

@section('left_sidebar')
    @include('store.control_panel.partial.left_sidebar')
@endsection

@section('info')
    <div class="col-sm-9 padding-right">
        <div class="content-right">
            <h2>Últimos Pedidos</h2>

            <table class="my-table">
                <tbody>
                    <tr>
                        <td class="stgTitle" colspan="3">Pedido <br>Realizado</td>
                        <td class="stgTitle" colspan="3">Autorização do <br>Pagamento</td>
                        <td class="stgTitle" colspan="3">Nota fiscal <br>eletrônica</td>
                        <td class="stgTitle" colspan="3">Produto(s) em <br>transporte</td>
                        <td class="stgTitle" colspan="3">Produto(s) <br>entregues(s)</td>
                    </tr>

                    <tr>
                        <td id="tdLineFirst" class="stgTdLinePrev" style="width: 10.0%;"></td>
                        <td class="stgTdIcon">
                            <div class="bgLine firstStage bglineColorCompleted"></div>
                            <div id="stgIcon1" class="stgIcon order completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bglineColorCompleted"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorCompleted"></div>
                            <div id="stgIcon2" class="stgIcon payment completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bglineColorCompleted"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorCompleted"></div>
                            <div id="stgIcon2" class="stgIcon preparation completed"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bgLineColorCompleted2Processing"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine bglineColorProcessing"></div>
                            <div id="stgIcon2" class="stgIcon transport processing"></div>
                        </td>
                        <td class="stgTdLineBetween" colspan="2" style="width: 20.0%;">
                            <div class="bgLine bgLineColorProcessing2Waiting"></div>
                        </td>
                        <td class="stgTdIcon">
                            <div class="bgLine lastStage bglineColorWaiting"></div>
                            <div id="stgIcon5" class="stgIcon delivered waiting"></div>
                        </td>
                        <td id="tdLineLast" style="width: 10.0%;"></td>
                    </tr>

                    <tr>
                        <td id="tdFooterStage1" colspan="3" class="stgFooter completed">
                            <div id="stage1_date_div" class="date" style="visibility: visible;">
                                <strong>Data: <span id="stage1_date">05/06/2015</span></strong>
                            </div>
                            <div class="date" style="visibility: visible;">
                                Hora: <span id="stage1_hour">15:30</span>
                            </div>
                            <span id="stage1_ico" class="footerIco completed"></span>
                        </td>
                        <td id="tdFooterStage2" colspan="3" class="stgFooter completed">
                            <div id="stage1_date_div" class="date" style="visibility: visible;">
                                <strong>Data: <span id="stage1_date">05/06/2015</span></strong>
                            </div>
                            <div class="date" style="visibility: visible;">
                                Hora: <span id="stage1_hour">15:30</span>
                            </div>
                            <span id="stage1_ico" class="footerIco processing"></span>
                        </td>
                        <td id="tdFooterStage3" colspan="3" class="stgFooter completed">
                            <div id="stage1_date_div" class="date" style="visibility: visible;">
                                <strong>Data: <span id="stage1_date">05/06/2015</span></strong>
                            </div>
                            <div class="date" style="visibility: visible;">
                                Hora: <span id="stage1_hour">15:30</span>
                            </div>
                            <span id="stage1_ico" class="footerIco completed"></span>
                        </td>
                        <td id="tdFooterStage4" colspan="3" class="stgFooter completed">
                            <div id="stage1_date_div" class="date" style="visibility: visible;">
                                <strong>Data: <span id="stage1_date">05/06/2015</span></strong>
                            </div>
                            <div class="date" style="visibility: visible;">
                                Hora: <span id="stage1_hour">15:30</span>
                            </div>
                            <span id="stage1_ico" class="footerIco completed"></span>
                        </td>
                        <td id="tdFooterStage5" colspan="3" class="stgFooter waiting">
                            <div id="stage1_date_div" class="date" style="visibility: visible;">
                                <strong>Data: <span id="stage1_date">05/06/2015</span></strong>
                            </div>
                            <div class="date" style="visibility: visible;">
                                Hora: <span id="stage1_hour">15:30</span>
                            </div>
                            <span id="stage1_ico" class="footerIco prevision"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

