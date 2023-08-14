@foreach ($articles as $article)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->desc}}</td>
                    <td>{{$article->Category->name}}</td>
                    @if ($article->status == 0)
                    <td>
                        <span class="badge bg-danger">
                            Private
                        </span>
                    </td>   
                    @else
                    <td>
                        <span class="badge bg-success">
                            Published
                        </span>
                    </td>     
                    @endif
                    <td>{{$article->views}}x</td>
                    <td>{{$article->publish_date}}</td>
                    <td>
                        <div class="text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategory{{$article->id}}">Detail</button>
                            <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#createCategory{{$article->id}}">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategory{{$article->id}}">Delete</button>
                        </div>
                    </td>
                </tr>
                @endforeach