<div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                              <thead class=" bg-slate-200 dark:bg-slate-700">
                                <tr>
                            <th scope="col" class=" table-th ">
                                   User ID 
                                  </th>
                                  <th scope="col" class=" table-th ">
                                   User Name 
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Email
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Mobile
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Role
                                  </th>

                                  
                                 

                                  <th scope="col" class=" table-th ">
                                    Status
                                  </th>

                                  <th scope="col" class=" table-th ">
                                    Action
                                  </th>

                                </tr>
                              </thead>
                              <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @if(!empty($result))
                                @foreach($result as $res)
                                <tr>
                                  <td class="table-td">{{  $res['user_id'] ?? '' }}</td>
                                  <td class="table-td ">{{  $res['firstname']  ?? '' }} {{  $res['lastname']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['email']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['mobile']  ?? '' }}</td>
                                  <td class="table-td">{{  $res['userrole']  ?? '' }}</td>
                                 
                                  
                                  <td class="table-td ">

                                    <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                              bg-success-500">
                                      paid
                                    </div>

                                  </td>
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:eye"></iconify-icon>
                                      </button>
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                      </button>
                                      <button class="action-btn" type="button">
                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                            @endforeach
                                                           
                                                            @endif
                              </tbody>
                            </table>
                          </div>