$(document).ready(function () {
  $('.maskData').mask('00/00/0000', { placeholder: "__/__/____" });
  $('.maskValidadeCartaoCredito').mask('00/00');
  $('.maskHora').mask('00:00:00', { placeholder: "00:00:00" });
  $('.maskDataHora').mask('00/00/0000 00:00:00', { placeholder: "__/__/____ 00:00:00" });
  $('.maskCep').mask('00000-000', { placeholder: "_____-___" });
  $('.maskTelefone').mask('(00) 0000-0000', { placeholder: "(00) 0000-0000" });
  $('.maskCelular').mask('(00) 00000-0000', { placeholder: "(00) 00000-0000" });
  $('.mixed').mask('AAA 000-S0S');
  $('.maskCpf').mask('000.000.000-00', { reverse: true });
  $('.cnpj').mask('00.000.000/0000-00', { reverse: true }, { placeholder: "__.___.___/____-__" });
  $('.maskMoeda').mask('000.000.000.000.000,00', { reverse: true, placeholder: "R$ 0,00" });
  $('.money2').mask("#.##0,00", { reverse: true });
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.maskPorcento').mask('##0,00%', { reverse: true, placeholder: "0,00 %" });
  $('.maskNumero').mask('##000', { reverse: true, placeholder: "00" });
  $('.clear-if-not-match').mask("00/00/0000", { clearIfNotMatch: true });
  $('.placeholder').mask("00/00/0000", { placeholder: "__/__/____" });
  $('.fallback').mask("00r00r0000", {
    translation: {
      'r': {
        pattern: /[\/]/,
        fallback: '/'
      },
      placeholder: "__/__/____"
    }
  });
  $('.selectonfocus').mask("00/00/0000", { selectOnFocus: true });
});