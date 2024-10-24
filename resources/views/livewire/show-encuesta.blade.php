<!-- modal.blade.php -->

<!-- Modal backdrop -->
<div>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet"
        href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap'); */

        

        .container-form {
            /* background-color: #152e4d; */
            background: url('{{ asset('img/bg.png') }}'), -webkit-linear-gradient(bottom, #0250c5, #152e4d);
            /* height:max-content; */
            text-align: center;
            border-radius: 5px;
            /* padding: 18% 35px 0 35px; */
            padding: 10px 35px 0 35px;
            height: 100% !important;
            min-height: 100vh;
        }



        .fab-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: transform 0.5s;
            z-index: 9999;
        }

        .fab-wrapper {
            position: relative;
        }

        .fab {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: none;
            color: white;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .fab i {
            display: flex;
            justify-content: center;
            align-items: center;
        }


        .tooltip {
            position: absolute;
            bottom: 70px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .fab-wrapper:hover .tooltip {
            opacity: 1;
            visibility: visible;
        }

        .info-button {
            background-color: #04527b;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .info-button .icon {
            margin-right: 10px;
        }

        .info-button:hover {
            background-color: #001a49;
            transform: scale(1.05);
        }

        .info-text {
            display: none;
            margin-top: 20px;
            font-size: 16px;
        }


        /*  */
    </style>

    <div>


        <div class="container-form">


            <h2 class="text-2xl font-extrabold text-white sm:text-3xl md:text-5xl mb-2">
                ENCUESTAS
            </h2>

          
   
            




            <div class="flex
        justify-center my-7 mx-8">

    <div class="relative w-96">
        <input wire:model.live="search"
            class="border-2 border-primary bg-red transition h-12 px-5 pr-16 rounded-md focus:outline-none w-full text-black text-lg "
            type="search" name="search" placeholder="Buscar..." />

        <button class="absolute right-2 top-3 mr-4">
            <svg class="text-black h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                width="512px" height="512px">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </button>


    </div>
</div>


@if ($encuestas->isEmpty())

    <body>
        <div class="flex flex-col justify-center items-center m-10">
            <div
                class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-gray-500 bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                <div class="space-y-4">
                    <h3 class="text-xl text-white font-bold lead-xl bold">¡No existen usuarios con
                        estas características!</h3>
                    <div class="text-lg italic text-white font-light">Revise los filtros porfavor.</div>
                </div>
            </div>
        </div>
    </body>
@else
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-white border-b">
                            <tr>
                                {{-- <th scope="col"
                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        #
                                    </th> --}}
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Título
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Descripción
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Encargado
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Completado
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                    Acciones
                                </th>
                                {{-- @role('Superadministrador') --}}
                                {{-- <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                            Acciones
                                        </th> --}}
                                {{-- @endrole --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($encuestas as $encuesta)
                                <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">

                                    <td class="text-sm text-gray-900 font-light px-6 py-4">
                                        {{ $encuesta->titulo }}
                                    </td>


                                    <td class="text-xs text-gray-900 italic px-6 py-4">
                                        {{ $encuesta->descripcion }}
                                    </td>

                                    <td class="text-sm text-gray-900 font-light px-6 py-4">
                                        {{ $encuesta->user->name }}
                                    </td>

                                    {{-- <td class="text-sm text-gray-900 font-light px-6 py-4"> --}}
                                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                            <div class="flex items-center">
                                                <span class="mr-2 font-bold text-gray-400">{{ $encuesta->progreso_encuesta }}%</span>
                                                <div class="relative w-full">
                                                    <div class="overflow-hidden h-2 text-xs flex rounded bg-red-200">
                                                        <div style="width: {{ $encuesta->progreso_encuesta }}%"
                                                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center 
                                                            @if ($encuesta->progreso_encuesta < 30) bg-red-600 
                                                            @elseif($encuesta->progreso_encuesta < 50) bg-orange-600 
                                                            @elseif($encuesta->progreso_encuesta < 70) bg-yellow-500 
                                                            @elseif($encuesta->progreso_encuesta < 90) bg-teal-600 
                                                            @else bg-green-600 @endif">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    <td>
                                        <div class='flex items-center justify-center'>

                                            <div class="m-2">

                                                <a href="{{ route('show-distritos-encuesta', ['encuesta' => $encuesta->id]) }}"
                                                    class="flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-blue-600 transition-all duration-300 text-white">
                                                    <i class="fas fa-eye text-lg leading-none"></i>
                                                </a>
                                            </div>
                                            <div class="m-2">
{{-- CHANGE THE PROGRESS OF THE ENCUESTA IN REAL TIME --}}
                                                <a href=""
                                                    class="flex p-2.5 bg-green-500 rounded-xl hover:rounded-3xl hover:bg-blue-600 transition-all duration-300 text-white">
                                                    <i class="fa-solid fa-bars-progress text-lg leading-none"></i>
                                                </a>
                                            </div>

                                        </div>
                                      
                                    </td>
                                  
                                </tr> @endforeach

                        </tbody>
                    </table>
                    <div class="pagination
        mt-4">
    {{ $encuestas->links() }}
</div>
</div>
</div>
</div>
</div>
@endif
</div>
</div>
