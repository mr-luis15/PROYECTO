<?php



//Funcion para devolver "No asignado" en caso de que no haya un Tecnico asignado
function isNull($dato, $mensaje) {

    if ($dato == "") {
        return $mensaje;
    }

    return $dato;
}




//Funcion para verificar si el telefono contiene caracteres validos (numeros)
function esTelefonoValido($numeros_telefono) {

    $numeros = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $telefono = str_split($numeros_telefono);

    foreach ($telefono as $num) {

        if (!in_array($num, $numeros))
            return false;

    }

    return true;


}




//Funcion para obtener los codigos telefonicos de los paises
function obtenerCodigosPaises() {

    $codigos = array(
        "México" => "+52",
        "Estados Unidos / Canadá" => "+1",
        "Egipto" => "+20",
        "Francia" => "+33",
        "España" => "+34",
        "Reino Unido" => "+44",
        "Alemania" => "+49",
        "Brasil" => "+55",
        "Chile" => "+56",
        "Colombia" => "+57",
        "Venezuela" => "+58",
        "Malasia" => "+60",
        "Australia" => "+61",
        "Indonesia" => "+62",
        "Filipinas" => "+63",
        "Nueva Zelanda" => "+64",
        "Tailandia" => "+66",
        "Japón" => "+81",
        "Corea del Sur" => "+82",
        "Vietnam" => "+84",
        "India" => "+91",
        "Pakistán" => "+92",
        "Afganistán" => "+93",
        "Sri Lanka" => "+94",
        "Birmania (Myanmar)" => "+95",
        "Irán" => "+98",
        "Marruecos" => "+212",
        "Argelia" => "+213",
        "Túnez" => "+216",
        "Libia" => "+218",
        "Gambia" => "+220",
        "Senegal" => "+221",
        "Mauritania" => "+222",
        "Malí" => "+223",
        "Guinea" => "+224",
        "Costa de Marfil" => "+225",
        "Burkina Faso" => "+226",
        "Níger" => "+227",
        "Togo" => "+228",
        "Benín" => "+229",
        "Mauricio" => "+230",
        "Liberia" => "+231",
        "Sierra Leona" => "+232",
        "Ghana" => "+233",
        "Nigeria" => "+234",
        "Chad" => "+235",
        "República Centroafricana" => "+236",
        "Camerún" => "+237",
        "Cabo Verde" => "+238",
        "San Tomé y Príncipe" => "+239",
        "Guinea Ecuatorial" => "+240",
        "Gabón" => "+241",
        "Congo" => "+242",
        "República Democrática del Congo" => "+243",
        "Angola" => "+244",
        "Guinea-Bisáu" => "+245",
        "Islas Chagos" => "+246",
        "Ascensión" => "+247",
        "Seychelles" => "+248",
        "Sudán" => "+249",
        "Ruanda" => "+250",
        "Etiopía" => "+251",
        "Somalia" => "+252",
        "Yibuti" => "+253",
        "Kenia" => "+254",
        "Tanzania" => "+255",
        "Uganda" => "+256",
        "Burundi" => "+257",
        "Mozambique" => "+258",
        "Comoras" => "+259",
        "Zambia" => "+260",
        "Madagascar" => "+261",
        "Reunión" => "+262",
        "Zimbabue" => "+263",
        "Namibia" => "+264",
        "Malaui" => "+265",
        "Lesoto" => "+266",
        "Botsuana" => "+267",
        "Suazilandia" => "+268",
        "Islas Comoras" => "+269",
        "Santa Elena" => "+290",
        "Eritrea" => "+291",
        "Alderney" => "+292",
        "Sark" => "+293",
        "Islas Faroe" => "+294",
        "Islas Malvinas" => "+295",
        "Islas Georgias del Sur" => "+296",
        "Aruba" => "+297",
        "Islas Feroe" => "+298",
        "Groenlandia" => "+299",
        "Grecia" => "+30",
        "Países Bajos" => "+31",
        "Bélgica" => "+32",
        "Hungría" => "+36",
        "Italia" => "+39",
        "Rumanía" => "+40",
        "Suiza" => "+41",
        "Checoslovaquia (hoy República Checa y Eslovaquia)" => "+42",
        "Austria" => "+43",
        "Dinamarca" => "+45",
        "Suecia" => "+46",
        "Noruega" => "+47",
        "Polonia" => "+48",
        "Islas Malvinas" => "+50",
        "Perú" => "+51",
        "México" => "+52",
        "Cuba" => "+53",
        "Argentina" => "+54",
        "Brasil" => "+55",
        "Chile" => "+56",
        "Colombia" => "+57",
        "Venezuela" => "+58",
        "Malasia" => "+60",
        "Australia" => "+61",
        "Indonesia" => "+62",
        "Filipinas" => "+63",
        "Nueva Zelanda" => "+64",
        "Singapur" => "+65",
        "Tailandia" => "+66",
        "Japón" => "+81",
        "Corea del Sur" => "+82",
        "Vietnam" => "+84",
        "China" => "+86",
        "Turquía" => "+90",
        "India" => "+91",
        "Pakistán" => "+92",
        "Afganistán" => "+93",
        "Sri Lanka" => "+94",
        "Birmania (Myanmar)" => "+95",
        "Irán" => "+98"
    );

    return $codigos;
}
