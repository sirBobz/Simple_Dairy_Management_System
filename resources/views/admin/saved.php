                                            <td class="text-center">
                                            <?php 
                                             $name = App\Models\User::where('id', '=', $user->id)->firstorfail();
                                             $first = $name->first_name; 
                                             $second = $name->second_name; 
                                             $full = "$first $second";
                                             ?> 
                                             {{$full}}</td>
                                            <td class="text-center"> 
                                            <?php 
                                             $det = App\Models\User::where('id', '=', $user->id)->firstorfail();
                                             $gender = $det->gender;  
                                             ?> {{$gender}}</td>
                                            <td class="text-center">
                                            <?php 
                                             $det = App\Models\User::where('id', '=', $user->id)->firstorfail();
                                             $email = $det->email;  
                                             ?>{{$email}} </td>