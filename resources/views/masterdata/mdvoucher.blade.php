@extends('layouts.app')
@section('title')
    Master Data
@endsection
@section('content')
                        <div>
                            <br>
                        </div>
                        <div class="row col-md-2">

                        </div>
                        <div class="row col-md-9">
                            <table id="listvoucher" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="display: none;">Id</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Voucher</th>
                                    <th>Valid Thru</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($members as $key => $member)
                                    <tr>
                                        <td class="idMember" style="display: none;">{{ $member->id }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ $member->voucher }}</td>
                                        <?php
                                        $dateValid = date('d F Y', strtotime($member->valid_thru));
                                        ?>
                                        <td>{{ $dateValid }}</td>
                                        <?php
                                        $date = date('Y-m-d');
                                        ?>
                                        @if ($member->valid_thru >= $date && $member->is_use == 0)
                                            <td>Active</td>
                                        @elseif($member->valid_thru >= $date || $member->is_use == 1)
                                            <td>Used</td>
                                        @else
                                            <td>Expired</td>
                                        @endif
                                        @if ($member->valid_thru >= $date && $member->is_use == 0)
                                            <td align="right"><a title="Used" href="{{ route('masterdata.edit', $member->id) }}" class="glyphicon glyphicon-check edit" style="color: green"></a> || <a title="Delete" href="{{ route('masterdata.destroy', $member->id) }}" class="glyphicon glyphicon-trash delete" style="color: red"></a>
                                            </td>
                                        @else
                                            <td align="right"><a title="Delete" href="{{ route('masterdata.destroy', $member->id) }}" class="glyphicon glyphicon-trash delete" style="color: red"></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
@endsection
