@extends('layouts.main')

@section('content')
@section('title', 'Pagina inicial')

{{-- <div id="title" class="text-center my-10">
    <h1 class="font-bold text-4xl text-white">{{ $conteudos->desc_Ecgm }}
        {{ App\Models\Jcgm::where(['selecionado' => 1])->first()->ano }}</h1>

</div> --}}

<div class="antialiased w-full h-full bg-black text-gray-400 font-inter p-10">
    <div class="container px-4 mx-auto">
        <div>
            <div id="title" class="text-center my-10">
                <h1 class="font-bold text-4xl text-white">Engenharia da Computação Gráfica e Multimédia</h1>
                <p class="text-light text-gray-500 text-xl">
                    Fica a par dos Cursos e do Núcleo
                </p>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-evenly gap-x-8 mt-10 pt-10">
                <div id="plan"
                    class="rounded-lg text-justify overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                        <h2 class="font-bold text-3xl text-white">Engenharia da Computação Gráfica e Multimédia</h2>

                    </div>
                    <div id="content" class="">
                        <div id="icon " class="my-5 mt-4 flex justify-center items-center  ">
                            <svg viewBox="0 0 1667 283" height="50px" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 14.68 0.00 L 294.56 0.00 C 294.22 4.61 293.86 9.22 293.47 13.83 C 258.43 33.40 223.44 53.06 188.18 72.24 C 181.54 76.13 174.45 79.29 166.97 81.20 C 155.40 84.29 142.23 84.68 131.62 78.38 C 93.68 56.47 55.39 35.04 15.58 16.66 C 15.34 11.10 14.90 5.56 14.68 0.00 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 188.07 85.14 C 224.12 62.25 262.05 42.24 296.59 17.00 C 299.87 22.14 306.06 26.19 305.94 32.89 C 301.61 44.80 294.89 55.65 288.56 66.57 C 252.08 128.29 216.72 190.65 180.71 252.64 C 179.38 254.92 178.29 257.58 175.84 258.89 C 172.00 261.10 167.45 261.38 163.23 262.39 C 164.07 221.28 166.01 180.11 163.09 139.04 C 162.91 129.27 161.12 119.05 164.58 109.63 C 169.85 99.41 178.59 91.43 188.07 85.14 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 0.99 22.37 C 10.29 21.17 19.62 23.69 27.85 27.92 C 38.70 33.53 48.87 40.35 59.31 46.66 C 80.82 59.88 102.91 72.14 124.11 85.84 C 130.03 89.84 136.11 94.32 139.25 100.95 C 149.07 121.51 152.73 144.38 154.12 166.94 C 156.37 199.05 157.29 231.25 157.00 263.44 C 149.42 261.73 140.97 262.14 134.27 257.76 C 128.61 251.44 124.65 243.85 120.45 236.54 C 84.69 175.60 50.55 113.70 13.44 53.56 C 7.57 43.97 3.78 33.23 0.99 22.37 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 367.01 41.00 C 410.33 41.00 453.64 41.00 496.96 41.00 C 514.30 41.10 531.65 40.76 548.99 41.26 C 590.00 41.23 630.99 40.83 672.00 41.00 C 672.09 79.26 671.23 117.53 672.25 155.78 C 636.84 154.98 601.42 154.67 565.99 154.75 C 520.17 154.74 474.35 154.76 428.53 154.74 C 437.82 139.73 444.73 123.31 455.17 109.00 C 499.11 107.73 543.05 109.22 586.99 109.00 C 597.36 108.94 607.76 109.24 618.12 108.52 C 621.28 108.22 625.31 107.38 626.41 103.92 C 627.17 99.68 626.10 94.08 621.46 92.51 C 613.59 89.85 605.12 90.83 596.97 90.32 C 535.47 89.72 474.00 91.75 412.50 91.50 C 412.84 117.51 411.18 143.57 413.32 169.53 C 440.87 169.86 468.42 170.62 495.98 170.50 C 536.66 171.22 577.34 170.38 618.02 170.50 C 630.33 169.98 642.66 170.41 654.98 170.21 C 661.22 169.85 667.49 170.04 673.75 170.00 C 665.65 185.72 659.15 202.37 649.05 216.98 C 646.01 221.05 640.42 220.85 635.89 221.16 C 608.26 221.82 580.61 221.36 552.98 221.50 C 520.66 221.50 488.34 221.50 456.03 221.50 C 426.02 221.61 396.02 221.06 366.01 221.25 C 366.68 161.17 365.66 101.06 367.01 41.00 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 688.30 41.00 C 791.59 41.01 894.88 40.98 998.17 41.02 C 991.25 58.75 981.38 75.15 970.48 90.70 C 962.82 92.78 954.81 92.68 946.96 92.26 C 877.41 92.23 807.85 92.26 738.30 92.25 C 737.71 105.16 738.12 118.10 738.00 131.03 C 737.84 144.27 738.35 157.51 738.79 170.74 C 768.18 170.64 797.56 170.09 826.96 170.25 C 883.51 170.23 940.06 170.19 996.61 170.52 C 990.96 189.22 982.05 207.74 967.06 220.75 C 904.72 221.66 842.36 221.50 780.00 221.51 C 759.68 220.98 739.34 221.38 719.02 221.23 C 708.69 220.77 698.34 221.10 688.00 221.00 C 687.78 190.98 687.44 160.96 687.50 130.93 C 686.76 112.30 687.75 93.66 687.49 75.03 C 687.87 63.69 687.74 52.33 688.30 41.00 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 1012.77 41.00 C 1091.84 41.00 1170.91 41.00 1249.98 41.00 C 1274.45 41.16 1298.93 41.54 1323.40 41.77 C 1314.61 57.13 1307.48 73.58 1296.48 87.56 C 1292.04 93.05 1284.19 91.55 1278.00 92.21 C 1206.08 92.31 1134.16 92.20 1062.25 92.27 C 1062.97 118.25 1062.89 144.26 1062.49 170.25 C 1074.67 170.30 1086.86 170.09 1099.05 170.51 C 1156.47 170.45 1213.89 170.74 1271.30 169.99 C 1270.63 149.25 1271.06 128.49 1271.55 107.75 C 1288.25 107.83 1304.95 107.44 1321.65 107.15 C 1322.61 139.45 1322.28 171.78 1321.93 204.08 C 1321.35 230.38 1321.51 256.69 1321.50 283.00 L 1011.77 283.00 C 1020.76 269.00 1026.17 252.76 1037.16 240.04 C 1039.39 236.95 1043.59 237.22 1046.97 236.82 C 1055.98 236.69 1064.99 236.66 1074.00 236.99 C 1130.99 237.68 1188.01 236.82 1245.01 237.51 C 1253.38 237.49 1261.78 237.00 1270.06 235.67 C 1271.96 235.48 1273.79 234.00 1273.77 231.96 C 1273.62 228.55 1271.40 225.78 1269.61 223.06 C 1255.58 220.24 1241.23 221.13 1227.03 221.00 C 1215.69 221.06 1204.35 220.82 1193.02 221.25 C 1132.68 221.25 1072.34 221.25 1012.00 221.25 C 1012.69 184.18 1011.80 147.11 1012.00 110.03 C 1012.35 87.02 1012.21 64.01 1012.77 41.00 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 1362.81 41.79 C 1390.52 41.24 1418.24 40.96 1445.97 41.01 C 1486.64 40.29 1527.31 41.13 1567.99 41.01 C 1580.65 41.60 1593.34 40.90 1606.00 41.50 C 1619.34 41.32 1632.66 41.88 1646.00 41.75 C 1646.02 101.50 1646.80 161.26 1645.72 221.00 C 1628.98 220.95 1612.25 221.44 1595.51 221.24 C 1595.45 178.33 1595.66 135.41 1595.25 92.50 C 1508.92 90.56 1422.52 95.14 1336.24 90.44 C 1344.10 73.70 1353.49 57.74 1362.81 41.79 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 1338.22 107.35 C 1353.66 107.71 1369.13 107.39 1384.58 107.51 C 1385.86 145.42 1384.86 183.34 1384.25 221.24 C 1368.91 221.38 1353.58 221.01 1338.25 220.74 C 1337.65 182.95 1337.46 145.13 1338.22 107.35 Z" />
                                <path fill="#4a41d7" stroke="#4a41d7" stroke-width="0.09375" opacity="0.94"
                                    d=" M 1466.51 108.29 C 1483.57 107.80 1500.62 107.52 1517.69 107.47 C 1519.04 145.31 1518.87 183.16 1518.00 221.00 C 1500.59 220.89 1483.19 221.45 1465.79 221.24 C 1465.10 208.82 1465.96 196.40 1465.75 183.97 C 1466.11 158.74 1466.60 133.52 1466.51 108.29 Z" />
                            </svg>


                        </div>
                        <div id="contain" class="leading-8 mb-10 text-base mt-4 font-light">
                            <ul>
                                <li>A Licenciatura em Engenharia da Computação Gráfica e Multimédia visa acompanhar e
                                    antecipar as necessidades de um setor de atividade em crescimento e deficitário no
                                    número de profissionais qualificados. O plano de formação contempla uma forte
                                    componente interdisciplinar que pretende formar profissionais com sólidos
                                    conhecimentos em Computação Gráfica e Multimédia Interativa. Salienta-se uma elevada
                                    componente prática que conduz a um domínio profundo dos conceitos, equipamentos e
                                    tecnologias, bem como ao desenvolvimento de metodologias de trabalho compativeis com
                                    as necessidades e competitividade do mercado de trabalho. Este curso superior foi
                                    recentemente acreditado pela A3ES (Agência de Avaliação e Acreditação do Ensino
                                    Superior). Após análise da OET - Ordem dos Engenheiros Técnicos foi registado na
                                    mesma e integrado no Colégio de Especialidade de Engenharia Informática.</li>

                            </ul>
                            {{-- <div id="choose" class="w-full mt-10 px-6">
                                <a href="#"
                                    class="w-full block bg-gray-900 font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover:text-white">Choose</a>
                            </div> --}}
                        </div>
                    </div>
                </div>






                <div id="plan"
                    class="rounded-lg text-justify overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                        <h2 class="font-bold text-3xl text-white">Desenvolvimento Web e Multimédia</h2>

                    </div>
                    <div id="content" class="">
                        <div id="icon" class="my-5 mt-4 flex justify-center items-center ">
                            <svg viewBox="0 0 320 68" height="50px" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 150.91 0.00 L 161.94 0.00 C 161.85 9.04 162.28 18.08 161.93 27.12 C 143.29 26.66 124.63 27.11 105.98 26.85 C 104.08 26.84 102.15 26.76 100.28 27.14 C 99.86 33.45 100.23 39.78 100.20 46.09 C 120.83 45.64 141.48 46.09 162.11 45.92 C 160.77 50.36 158.50 54.91 155.07 57.99 C 133.09 58.19 111.07 58.16 89.08 57.95 C 89.13 43.66 89.05 29.37 89.19 15.08 C 109.77 14.71 130.36 15.08 150.94 14.83 C 151.02 9.89 150.85 4.94 150.91 0.00 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 34.51 5.40 C 35.18 4.45 36.33 4.48 37.36 4.46 C 37.40 11.02 37.69 17.62 36.70 24.13 C 35.82 29.43 36.38 34.83 35.73 40.15 C 35.45 42.85 33.40 44.86 31.17 46.17 C 22.55 51.51 13.93 56.85 5.53 62.54 C 4.28 64.10 2.49 63.34 1.36 62.07 C 1.86 60.40 2.23 58.66 3.13 57.14 C 10.26 44.89 17.40 32.63 24.52 20.37 C 27.51 15.18 30.14 9.62 34.51 5.40 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 39.84 4.46 C 40.32 4.59 41.28 4.86 41.76 4.99 C 45.15 9.49 47.86 14.45 50.69 19.32 C 57.17 30.77 63.95 42.05 70.51 53.46 C 72.10 56.55 74.52 59.47 74.41 63.15 C 70.22 63.15 67.07 60.15 63.57 58.30 C 56.53 53.75 49.17 49.66 42.43 44.66 C 39.42 42.47 40.17 38.25 39.94 35.01 C 40.24 24.82 39.04 14.63 39.84 4.46 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 166.24 15.04 C 170.12 14.90 174.00 14.90 177.89 14.98 C 178.08 25.31 177.74 35.65 178.16 45.98 C 198.60 45.55 219.07 46.43 239.49 45.48 C 239.54 49.81 236.37 52.98 234.74 56.72 C 234.26 58.27 232.32 57.98 231.08 58.08 C 209.43 58.07 187.78 58.14 166.12 58.07 C 166.02 43.73 165.59 29.36 166.24 15.04 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 197.14 15.10 C 201.06 15.08 204.98 14.97 208.91 14.83 C 208.89 23.84 209.18 32.86 208.78 41.86 C 205.01 42.57 201.06 41.75 197.22 41.78 C 196.94 32.89 197.11 23.99 197.14 15.10 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 228.02 14.94 C 232.07 15.01 236.12 15.00 240.18 14.89 C 240.15 23.99 240.34 33.09 239.89 42.19 C 235.95 42.03 232.00 42.14 228.06 41.84 C 227.93 32.87 227.95 23.90 228.02 14.94 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 250.13 15.23 C 254.04 14.68 258.02 15.01 261.96 14.89 C 280.55 14.97 299.13 14.86 317.72 14.94 C 317.80 29.27 317.52 43.60 317.78 57.94 C 313.90 58.19 310.01 58.01 306.12 58.07 C 305.84 47.78 306.16 37.47 306.03 27.18 C 297.37 26.74 288.68 26.86 280.01 27.10 C 268.17 26.95 256.31 26.64 244.47 27.27 C 245.26 22.83 247.57 18.87 250.13 15.23 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 244.22 31.08 C 247.84 30.81 251.47 30.95 255.10 30.93 C 254.94 39.93 254.95 48.93 255.10 57.93 C 251.39 58.06 247.68 58.04 243.97 57.92 C 243.97 48.97 244.02 40.03 244.22 31.08 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 274.90 31.16 C 278.55 30.98 282.20 30.88 285.86 30.84 C 286.06 39.87 285.90 48.91 286.04 57.94 C 282.32 58.08 278.59 58.09 274.87 57.92 C 274.91 49.00 274.92 40.08 274.90 31.16 Z" />
                                <path fill="#4b42da" stroke="#4b42da" stroke-width="0.09375" opacity="0.95"
                                    d=" M 17.18 57.94 C 22.89 55.18 28.15 51.49 34.07 49.20 C 38.59 47.51 43.12 49.81 47.06 51.90 C 54.24 55.69 61.62 59.14 68.60 63.31 C 70.55 64.32 71.62 66.28 72.84 68.00 L 3.03 68.00 C 5.81 62.44 12.20 60.85 17.18 57.94 Z" />
                            </svg>

                        </div>
                        <div id="contain" class="leading-8 mb-10 text-base mt-4 font-light">
                            <ul>
                                <li>O CTeSP em Desenvolvimento Web e Multimédia pretende qualificar técnicos/as
                                    superiores que, de forma autónoma ou integrados numa equipa, sejam capazes de atuar
                                    na conceção, planeamento, desenvolvimento, implementação e manutenção de soluções no
                                    domínio dos sistemas e tecnologias web e na produção e integração de produtos e
                                    conteúdos multimédia. Destacam-se as saídas profissionais destes técnicos
                                    nomeadamente: o desenvolvimento de conteúdos multimédia interativos; a produção de
                                    áudio, vídeo e animação digital; o desenvolvimento e implementação de soluções para
                                    a web e a manutenção de Sistemas de Gestão de Conteúdos Web. Os detentores desta
                                    formação podem candidatar-se às licenciaturas da ESTG/IPVC, com dispensa de prova de
                                    ingresso, nomeadamente a de Engenharia da Computação Gráfica e Multimédia e a de
                                    Engenharia Informática.</li>

                            </ul>
                            {{-- <div id="choose" class="w-full mt-10 px-6">
                                <a href="#"
                                    class="w-full block bg-gray-900 font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover:text-white">Choose</a>
                            </div> --}}
                        </div>
                    </div>
                </div>




                <div id="plan"
                    class="rounded-lg text-justify overflow-hidden w-full transform hover:shadow-2xl hover:scale-105 transition duration-200 ease-in">
                    <div id="title" class="w-full py-5 border-b border-gray-800">
                        <h2 class="font-bold text-3xl text-white">Núcleo de Computação Gráfica e Multimédia</h2>

                    </div>
                    <div id="content" class="">
                        <div id="icon" class="my-5 mt-4 flex justify-center items-center ">
                            <svg viewBox="0 0 760 240" height="50px" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill="#4f46e5" stroke="#4f46e5" stroke-width="0.09375" opacity="1.00"
                                    d=" M 411.02 0.00 L 411.85 0.00 C 411.87 0.42 411.92 1.25 411.95 1.66 L 411.21 1.69 C 411.16 1.27 411.07 0.42 411.02 0.00 Z" />
                                <path fill="#4f46e5" stroke="#4f46e5" stroke-width="0.09375" opacity="1.00"
                                    d=" M 573.89 0.00 L 575.35 0.00 C 586.98 7.42 599.35 13.64 611.08 20.91 C 613.59 22.14 616.00 24.09 618.80 24.43 C 623.35 22.76 627.38 19.97 631.55 17.54 C 640.68 11.98 650.39 7.42 659.27 1.47 C 661.02 1.26 662.45 3.22 664.02 3.96 C 689.39 19.18 715.37 33.42 740.95 48.28 C 741.29 50.83 741.14 53.42 741.14 55.99 C 740.97 109.21 741.36 162.45 740.97 215.66 C 732.48 219.66 724.71 225.01 716.46 229.47 C 710.62 232.69 705.24 236.75 699.07 239.32 C 698.92 189.87 699.01 140.41 699.01 90.96 C 699.78 85.65 699.70 80.25 700.61 74.96 C 690.50 69.24 680.55 63.25 670.42 57.57 C 666.81 55.14 662.80 53.27 659.64 50.23 C 658.06 51.50 656.48 52.77 654.68 53.70 C 644.38 59.31 634.41 65.52 624.10 71.11 C 621.83 72.51 619.53 75.43 616.69 73.39 C 603.56 66.27 590.64 58.70 577.82 51.05 C 575.83 51.26 574.15 52.51 572.44 53.44 C 563.54 58.99 554.38 64.08 545.29 69.29 C 542.07 70.96 538.96 72.84 536.13 75.12 C 536.69 77.36 537.07 79.64 537.03 81.96 C 536.92 134.41 537.10 186.86 536.93 239.31 C 532.22 237.62 528.37 234.33 523.99 232.00 C 514.35 226.59 504.83 220.95 495.14 215.63 C 492.63 208.10 496.93 200.14 493.80 192.68 C 480.66 201.63 466.50 208.88 452.72 216.74 C 441.76 223.59 430.38 229.72 419.24 236.26 C 417.19 237.31 415.13 240.19 412.69 238.40 C 387.71 224.01 362.87 209.36 337.69 195.32 C 335.98 194.38 334.49 193.10 332.98 191.88 C 321.33 198.61 310.03 205.95 298.02 212.05 C 287.12 218.06 276.72 224.91 265.73 230.76 C 261.12 233.57 256.07 235.65 251.87 239.10 C 247.76 238.03 244.33 235.37 240.64 233.38 C 222.72 223.36 205.16 212.72 187.17 202.84 C 181.01 199.38 175.28 195.22 169.01 191.97 C 168.99 199.59 169.03 207.21 169.08 214.83 C 155.13 223.06 141.12 231.20 127.00 239.14 C 126.94 183.90 127.09 128.65 126.93 73.40 C 120.12 69.91 113.64 65.81 106.99 62.03 C 100.45 58.23 93.74 54.69 87.53 50.35 C 86.43 49.36 85.18 50.69 84.19 51.16 C 75.34 56.78 66.31 62.12 57.09 67.11 C 53.34 69.39 49.18 71.08 46.02 74.22 C 46.16 129.18 45.97 184.14 46.08 239.10 C 43.18 237.66 40.28 236.20 37.55 234.45 C 26.83 228.03 15.80 222.12 5.09 215.71 C 4.34 207.30 5.43 198.81 4.54 190.40 C 3.72 185.64 4.02 180.81 4.00 176.01 C 4.00 134.35 4.00 92.69 4.00 51.04 C 3.62 49.27 5.07 48.13 6.47 47.43 C 13.93 43.72 20.99 39.28 28.29 35.27 C 38.70 28.93 49.59 23.41 59.92 16.92 C 68.33 11.86 77.07 7.40 85.49 2.36 C 86.64 1.39 87.91 2.43 88.95 2.98 C 114.16 17.89 139.81 32.04 164.98 47.02 C 168.10 49.40 171.46 46.69 174.35 45.35 C 179.02 43.19 183.10 40.01 187.64 37.62 C 201.26 29.51 215.32 22.14 228.80 13.78 C 235.20 9.67 242.17 6.57 248.51 2.37 C 250.47 1.03 252.42 3.04 254.10 3.91 C 277.47 17.59 301.11 30.80 324.44 44.56 C 326.79 45.95 329.29 47.20 332.00 47.74 C 336.17 46.91 339.71 44.43 343.31 42.30 C 352.25 36.82 361.44 31.74 370.55 26.53 C 384.92 18.11 399.28 9.69 413.89 1.70 C 419.49 5.38 425.55 8.26 431.30 11.69 C 450.97 23.48 471.15 34.37 490.79 46.20 C 492.51 47.18 494.51 48.77 496.56 47.63 C 501.60 45.13 506.43 42.19 511.20 39.20 C 523.77 31.68 536.83 25.00 549.30 17.29 C 557.89 12.36 566.28 7.06 575.24 2.79 C 574.82 1.84 574.37 0.91 573.89 0.00 M 210.03 73.17 C 210.03 104.65 209.87 136.13 210.11 167.60 C 222.29 174.44 234.56 181.16 246.40 188.58 C 247.52 189.07 248.55 190.34 249.88 189.97 C 258.70 186.14 266.45 180.34 274.95 175.91 C 281.40 171.56 288.37 168.08 295.03 164.06 C 307.07 157.40 318.56 149.67 330.95 143.68 C 331.06 114.11 330.95 84.53 331.01 54.96 C 331.12 53.50 330.53 52.16 329.95 50.87 C 319.83 57.25 309.39 63.10 299.00 69.02 C 296.33 70.21 294.03 72.02 291.98 74.07 C 277.75 66.45 263.80 58.25 250.00 49.84 C 236.84 57.89 223.49 65.63 210.03 73.17 M 409.41 52.42 C 401.77 57.21 393.92 61.68 386.06 66.10 C 381.71 68.80 376.96 70.86 373.02 74.20 C 373.19 103.81 373.15 133.42 373.08 163.03 C 373.03 164.85 373.46 166.86 374.77 168.20 C 387.31 175.31 400.00 182.20 412.11 190.05 C 418.48 188.13 423.69 183.50 429.67 180.61 C 437.33 175.99 445.12 171.52 453.24 167.75 C 444.23 161.48 434.18 156.99 424.94 151.10 C 421.19 149.48 418.14 146.26 413.98 145.74 C 413.95 129.11 413.85 112.47 414.02 95.84 C 418.51 98.29 422.43 101.66 427.00 103.98 C 437.63 109.96 448.14 116.14 458.69 122.26 C 470.62 128.94 482.58 135.60 494.00 143.14 C 494.00 133.43 494.01 123.72 493.99 114.00 C 493.64 107.66 495.40 101.48 494.95 95.12 C 483.66 89.14 472.75 82.47 461.41 76.59 C 445.65 67.57 429.45 59.32 413.87 49.96 C 412.12 50.06 410.90 51.64 409.41 52.42 Z" />
                            </svg>

                        </div>
                        <div id="contain" class="leading-8 mb-10 text-base mt-4 font-light">
                            <p class="text-justify">
                                O Núcleo da Computação Gráfica e Multimédia (NCGM) é composto por um grupo de
                                estudantes de Engenharia da Computação Gráfica e Multimédia e do CTeSP de
                                Desenvolvimento Web e Multimédia da Escola Superior de Tecnologias e Gestão (ESTG),
                                que tem como objetivo principal representar e promover ambos os cursos. Além disso,
                                o mesmo procura organizar atividades de conteúdos variados com o fundamento de
                                complementar os cursos para que a experiência académica de cada estudante seja ainda
                                mais rica.
                            </p>

                            {{-- <div id="choose" class="w-full mt-10 px-6">
                                <a href="#"
                                    class="w-full block bg-gray-900 font-medium text-xl py-4 rounded-xl hover:shadow-lg transition duration-200 ease-in-out hover:bg-indigo-600 hover:text-white">Choose</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
