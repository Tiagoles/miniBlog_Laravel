 <div class="modal fade" id="addPosteUpdate" tabindex="-1" aria-labelledby="title-add-post" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5 my-0 mx-auto" id="title-add-post">Adicionar publicação</h1>
                 <button type="button" class="btn-close m-0 p-0" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div id="container-form-create-post">
                     <form id="modal-form" action="{{ route('posts.store') }}" method="POST"
                         enctype="multipart/form-data">
                         @csrf
                         <div class="col-span-full">
                             <label for="cover-photo"
                                 class="block text-sm font-medium leading-6 text-center">Imagem</label>
                             <div
                                 class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                 <div class="text-center">
                                     <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                         fill="currentColor" aria-hidden="true">
                                         <path fill-rule="evenodd"
                                             d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                             clip-rule="evenodd" />
                                     </svg>
                                     <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600">
                                         <label for="file-upload"
                                             class="py-2 px-2 my-2 relative cursor-pointer font-semibold text-indigo-600 hover:text-indigo-500">
                                             <input type="file" name="image_post" id="profile_photo_user_create"
                                                 class="block w-full ">
                                         </label>
                                     </div>
                                     <p class=" text-center text-xs leading-5">Suportamos apenas PNG, JPG.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="col-span-full">
                             <label for="description-post-create"
                                 class="block text-sm font-medium leading-6 text-center">Descrição</label>
                             <div class="mt-2">
                                 <textarea id="description-post-create" name="description" cols="30" rows="10"
                                     placeholder="Digite algo aqui..."
                                     class="block w-full rounded-md py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 border border-dashed"
                                     ></textarea>
                             </div>
                             <p class="mt-3 text-sm leading-6">Escreva sobre sentimentos, vontades, etc.</p>
                             <button
                                 class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-2"
                                 type="submit">Publicar</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var addPosteUpdateModal = document.getElementById('addPosteUpdate');
         addPosteUpdateModal.addEventListener('show.bs.modal', function(event) {
             var button = event.relatedTarget;
             var mode = button.getAttribute('data-mode');
             var postId = button.getAttribute('data-post-id');
             var description = button.getAttribute('data-description');
             var image = button.getAttribute('data-image');

             var modalTitle = addPosteUpdateModal.querySelector('.modal-title');
             var form = addPosteUpdateModal.querySelector('#modal-form');
             var descriptionField = addPosteUpdateModal.querySelector('#description-post-create');
             var fileUploadField = addPosteUpdateModal.querySelector('#file-upload');

             if (mode === 'update') {

                 modalTitle.textContent = 'Editar publicação';
                 form.action = `/posts/${postId}/update`;
                 descriptionField.value = description;


             } else {
                 modalTitle.textContent = 'Adicionar publicação';
                 form.action = '{{ route('posts.store') }}';
                 descriptionField.value = '';
                 fileUploadField.value = '';
             }
         });
     });
 </script>
