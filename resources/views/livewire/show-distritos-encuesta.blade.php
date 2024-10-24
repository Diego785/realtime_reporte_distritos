<!-- modal.blade.php -->

<!-- Modal backdrop -->
<div>
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



    <div class="container-form">


        <h2 class="text-2xl font-extrabold text-white sm:text-3xl md:text-5xl mb-2">
            {{ $encuesta->titulo }}
        </h2>

        <div class="relative w-full py-4">
            <select style="width: 100%; border: 1px solid lightgrey; border-radius: 5px; padding-left: 15px;"
                wire:model.live="status" class="dark:text-gray-800">
                <option disabled selected value="0">Selecciona un Estado</option>
                <option value="">Todos</option>
                <option value="Completado">Completado</option>
                <option value="En proceso">En proceso</option>
                <option value="Pendiente">Pendiente</option>
            </select>


        </div>


        <!-- Progress Bar -->
        <div class="mt-4">
            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-white 
                                @if ($encuesta->progreso_encuesta < 30) bg-red-600 @elseif($encuesta->progreso_encuesta < 50) bg-orange-600 @elseif($encuesta->progreso_encuesta < 70) bg-yellow-500 @elseif($encuesta->progreso_encuesta < 90) bg-teal-600 @else bg-green-600 @endif">
                            Progreso: {{ $encuesta->progreso_encuesta, 1 }}%
                        </span>
                    </div>
                </div>
                <div class="flex h-2 mb-2 overflow-hidden bg-gray-200 rounded">
                    <div style="width: {{ $encuesta->progreso_encuesta }}%;"
                        class="flex flex-col text-center text-white 
                            @if ($encuesta->progreso_encuesta < 30) bg-red-600 @elseif($encuesta->progreso_encuesta < 50) bg-orange-600 @elseif($encuesta->progreso_encuesta < 70) bg-yellow-500 @elseif($encuesta->progreso_encuesta < 90) bg-teal-600 @else bg-green-600 @endif 
                            shadow-none whitespace-nowrap transition-all duration-500 ease-in-out">
                    </div>
                </div>
            </div>
        </div>





        <div class="flex justify-center my-7 mx-8">

            @if ($distritos->isEmpty())

                <body>
                    <div class="flex flex-col justify-center items-center m-10">
                        <div
                            class="relative flex flex-col items-center rounded-[20px] w-[700px] max-w-[95%] mx-auto bg-gray-500 bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none p-3">
                            <div class="space-y-4">
                                <h3 class="text-xl text-white font-bold lead-xl bold">¡No hay distritos en este estado!</h3>
                                <div class="text-lg italic text-white font-light">Seleccione otro estado porfavor.</div>
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

                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                Distrito
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                Estado
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                                                Observaciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($distritos as $distrito)
                                            <tr class="{{ $loop->even ? 'bg-white' : 'bg-gray-100' }} border-b">

                                                <td class="text-xs text-gray-900 font-light px-4 leading-tight">
                                                    {{ $distrito->nombre }}
                                                </td>



                                                <td class="text-xs text-gray-900 italic px-4 leading-tight">
                                                    @php
                                                        $status =
                                                            $distrito->encuestas->firstWhere('id', $encuesta->id)->pivot
                                                                ->estado_encuesta ?? 'Sin Estado';
                                                    @endphp
                                                    <span
                                                        class="rounded py-1 px-3 text-xs text-white font-bold
                                                {{ $status == 'Completado' ? 'bg-green-400' : ($status == 'En proceso' ? 'bg-yellow-400' : 'bg-red-400') }}">
                                                        {{ ucfirst($status) }}
                                                    </span>
                                                </td>

                                                <td class="text-xs text-gray-900 italic px-4 leading-tight">
                                                    <div class='flex items-center justify-center'>

                                                        <div class="m-2">

                                                            @php
                                                                $observation =
                                                                    $distrito->encuestas->firstWhere(
                                                                        'id',
                                                                        $encuesta->id,
                                                                    )->pivot->observation ?? '';
                                                            @endphp

                                                            @if (!empty($observation))
                                                                <button wire:click=""
                                                                    class="flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-blue-600 transition-all duration-300 text-white">
                                                                    <i class="fas fa-eye text-lg leading-none"></i>
                                                                </button>
                                                            @else
                                                                <span
                                                                    class="rounded py-1 px-3 text-xs text-white font-bold bg-gray-500">
                                                                    Sin Observaciones
                                                                </span>
                                                            @endif

                                                        </div>

                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            @endif

        </div>
    </div>
</div>